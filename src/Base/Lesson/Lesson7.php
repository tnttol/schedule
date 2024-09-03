<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\LessonInterface;

class Lesson7 extends AbstractLesson implements LessonInterface
{
    public function getStartTime(): string
    {
        return '14:30';
    }

    public function getEndTime(): string
    {
        return '15:15';
    }
}
