<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Mishchenko;

class Music extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Mishchenko());
    }

    public function getInfo(): string
    {
        return 'https://classroom.google.com/c/NzEwMzMxNDkyMzg2?cjc=shmaqtg';
    }

    public function getSubjectName(): string
    {
        return 'subject.music';
    }
}
