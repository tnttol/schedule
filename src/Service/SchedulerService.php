<?php declare(strict_types=1);

namespace App\Service;

use App\Base\DayInterface;
use DateException;
use DateInterval;
use DateTime;

readonly class SchedulerService
{
    public function __construct(
        private TelegramService $telegramService
    ) {
    }

    private function getDay(): ?DayInterface
    {
        $className = '\App\Base\Day\Day' . date('N');

        if (!class_exists($className)) {
            return null;
        }

        return new $className;
    }

    private function checkIsNowTime(DateTime $time): bool
    {
        $now = (new DateTime())->format('H:i');
        $checkingTime = $time->format('H:i');

        return $now === $checkingTime;
    }

    /**
     * @throws DateException
     */
    public function daySchedule(int $minutesBefore = 60): bool
    {
        $day = $this->getDay();
        $firstLesson = current($day->getLessons());
        $checkTime = (new DateTime($firstLesson->getStartTime()))->sub(new DateInterval('PT' . $minutesBefore . 'M'));

        if (!$this->checkIsNowTime($checkTime)) {
            return false;
        }

        $messages = [];
        $header = 'Расписание уроков на сегодня';

        foreach ($day->getLessons() as $n => $lesson) {
            $subject = $lesson->getSubject();
            $messages[] = 'Урок ' . $n . ': (' . $lesson->getStartTime() . ' - ' . $lesson->getEndTime() . ') ' . $subject->getSubjectName();
        }

        if (empty($messages)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendLog($header, $message);
    }

    /**
     * @throws DateException
     */
    public function checkStartAndSend(): bool
    {
        $day = $this->getDay();

        if (!$day) {
            return false;
        }

        $header = '';
        $messages = [];

        foreach ($day->getLessons() as $n => $lesson) {
            if (!$this->checkIsNowTime(new DateTime($lesson->getStartTime()))) {
                continue;
            }

            $subject = $lesson->getSubject();
            $header = 'Урок ' . $n . ': ' . $subject->getSubjectName();
            $messages[] = 'Время: ' . $lesson->getStartTime() . ' - ' . $lesson->getEndTime();

            foreach ($subject->getTeachers() as $teacher) {
                $messages[] = 'Учитель: ' . $teacher->getFullName();
                $messages[] = $teacher->getInfo();
            }
        }

        if (empty($header)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendLog($header, $message);
    }

    /**
     * @throws DateException
     */
    public function checkEndAndSend(): bool
    {
        $day = $this->getDay();

        if (!$day) {
            return false;
        }

        $header = '';
        $messages = [];

        foreach ($day->getLessons() as $n => $lesson) {
            if (!$this->checkIsNowTime(new DateTime($lesson->getEndTime()))) {
                continue;
            }
            $subject = $lesson->getSubject();
            $header = 'Урок ' . $n . ': ' . $subject->getSubjectName();
            $messages[] = 'Конец урока';
        }

        if (empty($header)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendLog($header, $message);
    }
}
