<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson5 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 5;
    }

    public function getStartTime(): string
    {
        return '12:40';
    }

    public function getEndTime(): string
    {
        return '13:25';
    }
}
