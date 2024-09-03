<?php declare(strict_types=1);

namespace App\Base;

use App\Base\Lesson\AbstractLesson;

interface LessonInterface
{
    public function getStartTime(): string;
    public function getEndTime(): string;
    public function addSubject(SubjectInterface $subject);
    public function getSubject(): SubjectInterface;
}