<?php declare(strict_types=1);

namespace App\Base\Day;

use App\Base\LessonInterface;

class AbstractDay
{
    private array $lessons = [];

    public function addLesson(LessonInterface $lesson): AbstractDay
    {
        $this->lessons[] = $lesson;

        return $this;
    }

    /**
     * @return array<LessonInterface>
     */
    public function getLessons(): array
    {
        return $this->lessons;
    }
}
