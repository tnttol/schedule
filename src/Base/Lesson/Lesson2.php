<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson2 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 2;
    }

    public function getStartTime(): string
    {
        return '9:55';
    }

    public function getEndTime(): string
    {
        return '10:40';
    }
}
