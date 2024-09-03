<?php declare(strict_types=1);

namespace App\Base;

interface DayInterface
{
    public function addLesson(LessonInterface $lesson);
    public function getLessons(): array;
}
