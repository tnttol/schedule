<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson8 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 8;
    }

    public function getStartTime(): string
    {
        return '15:25';
    }

    public function getEndTime(): string
    {
        return '16:10';
    }
}
