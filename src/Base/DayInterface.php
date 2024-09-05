<?php declare(strict_types=1);

namespace App\Base;

interface DayInterface
{
    public function addLesson(LessonInterface $lesson);

    /**
     * @return array<LessonInterface>
     */
    public function getLessons(): array;
}
