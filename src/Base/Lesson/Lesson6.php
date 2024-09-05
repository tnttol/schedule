<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson6 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 6;
    }

    public function getStartTime(): string
    {
        return '13:35';
    }

    public function getEndTime(): string
    {
        return '14:20';
    }
}
