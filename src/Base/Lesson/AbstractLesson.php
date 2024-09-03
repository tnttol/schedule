<?php declare(strict_types=1);

namespace App\Base\Lesson;

use App\Base\SubjectInterface;

class AbstractLesson
{
    private SubjectInterface $subject;

    public function addSubject(SubjectInterface $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubject(): SubjectInterface
    {
        return $this->subject;
    }
}
