<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson3 extends AbstractLesson implements LessonInterface
{
    public function getNumber(): int
    {
        return 3;
    }

    public function getStartTime(): string
    {
        return '10:50';
    }

    public function getEndTime(): string
    {
        return '11:35';
    }
}
