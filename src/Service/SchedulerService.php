<?php declare(strict_types=1);

namespace App\Service;

use App\Base\DayInterface;
use App\Base\LessonInterface;
use DateException;
use DateInterval;
use DateTime;
use IntlDateFormatter;
use Symfony\Contracts\Translation\TranslatorInterface;

final readonly class SchedulerService
{
    public function __construct(
        private TelegramService $telegramService,
        private TranslatorInterface $translator
    ) {
    }

    /**
     * @return ?array<LessonInterface>
     */
    private function getLessons(bool $isNext = false): ?array
    {
        $n = (int) date('N');

        while (true) {
            $className = '\App\Base\Day\Day' . $n;

            if (!$isNext) {
                break;
            }

            $className = '\App\Base\Day\Day' . ++$n;

            if (class_exists($className)) {
                break;
            }

            if ($n >= 7) {
                $n = 0;
            }
        }

        /** @var ?DayInterface $day */
        $day = class_exists($className) ? new $className : null;

        return $day?->getLessons();
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
    public function todaySchedule(int $minutesBefore = 60): bool
    {
        $lessons = $this->getLessons();

        if (!$lessons) {
            return false;
        }

        $firstLesson = current($lessons);
        $checkTime = (new DateTime($firstLesson->getStartTime()))->sub(new DateInterval('PT' . $minutesBefore . 'M'));

        if (!$this->checkIsNowTime($checkTime)) {
            return false;
        }

        $messages = [];

        foreach ($lessons as $lesson) {
            $subject = $lesson->getSubject();
            $messages[] = $this->translator->trans('schedule.full_info', [
                '%number%' => $lesson->getNumber(),
                '%start_time%' => $lesson->getStartTime(),
                '%end_time%' => $lesson->getEndTime(),
                '%subject%' => $this->translator->trans($subject->getSubjectName())
            ]);
        }

        if (empty($messages)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendMessage(
            $this->translator->trans('schedule.today', ['%date%' => IntlDateFormatter::formatObject(new DateTime(), 'eeee d MMMM')]),
            $message
        );
    }

    /**
     * @throws DateException
     */
    public function nextDaySchedule(int $minutesAfter = 10): bool
    {
        $lessons = $this->getLessons();

        if (!$lessons) {
            return false;
        }

        $lastLesson = end($lessons);
        $checkTime = (new DateTime($lastLesson->getEndTime()))->add(new DateInterval('PT' . $minutesAfter . 'M'));

        if (!$this->checkIsNowTime($checkTime)) {
            return false;
        }

        $lessons = $this->getLessons(true);

        if (!$lessons) {
            return false;
        }

        $messages = [];

        foreach ($lessons as $lesson) {
            $subject = $lesson->getSubject();
            $messages[] = $this->translator->trans('schedule.full_info', [
                '%number%' => $lesson->getNumber(),
                '%start_time%' => $lesson->getStartTime(),
                '%end_time%' => $lesson->getEndTime(),
                '%subject%' => $this->translator->trans($subject->getSubjectName())
            ]);
        }

        if (empty($messages)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendMessage(
            $this->translator->trans('schedule.next_day'),
            $message
        );
    }

    /**
     * @throws DateException
     */
    public function checkStartAndSend(): bool
    {
        $lessons = $this->getLessons();

        if (!$lessons) {
            return false;
        }

        $header = '';
        $messages = [];

        foreach ($lessons as $lesson) {
            if (!$this->checkIsNowTime(new DateTime($lesson->getStartTime()))) {
                continue;
            }

            $subject = $lesson->getSubject();
            $header = $this->translator->trans('schedule.short_info', [
                '%number%' => $lesson->getNumber(),
                '%subject%' => $this->translator->trans($subject->getSubjectName())
            ]);
            $messages[] = $this->translator->trans('schedule.time_info', [
                '%start_time%' => $lesson->getStartTime(),
                '%end_time%' => $lesson->getEndTime(),
            ]);

            foreach ($subject->getTeachers() as $teacher) {
                if ($teacher->getFullName()) {
                    $messages[] = $this->translator->trans('schedule.teacher', [
                        '%teacher_name%' => $this->translator->trans($teacher->getFullName())
                    ]);
                }

                if ($teacher->getInfo()) {
                    $messages[] = $teacher->getInfo();
                }

                $messages[] = '';
            }
        }

        if (empty($header)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendMessage($header, $message);
    }

    /**
     * @throws DateException
     */
    public function checkEndAndSend(): bool
    {
        $lessons = $this->getLessons();

        if (!$lessons) {
            return false;
        }

        $header = '';
        $messages = [];

        foreach ($lessons as $lesson) {
            if (!$this->checkIsNowTime(new DateTime($lesson->getEndTime()))) {
                continue;
            }

            $subject = $lesson->getSubject();
            $header = $this->translator->trans('schedule.short_info', [
                '%number%' => $lesson->getNumber(),
                '%subject%' => $this->translator->trans($subject->getSubjectName())
            ]);
            $messages[] = $this->translator->trans('schedule.end_of_lesson');
        }

        if (empty($header)) {
            return false;
        }

        $message = trim(implode(PHP_EOL, $messages));

        return $this->telegramService->sendMessage($header, $message);
    }
}
