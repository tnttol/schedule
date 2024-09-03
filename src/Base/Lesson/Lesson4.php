<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson4 extends AbstractLesson implements LessonInterface
{
    public function getStartTime(): string
    {
        return '11:45';
    }

    public function getEndTime(): string
    {
        return '12:30';
    }
}
