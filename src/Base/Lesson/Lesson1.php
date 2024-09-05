<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson1 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 1;
    }

    public function getStartTime(): string
    {
        return '9:00';
    }

    public function getEndTime(): string
    {
        return '9:45';
    }
}
