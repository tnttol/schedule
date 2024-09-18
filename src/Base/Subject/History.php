<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Nozdrachova;

class History extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Nozdrachova());
    }

    public function getInfo(): string
    {
        return '<a href="https://classroom.google.com/c/Njg1MzM1NTExNjg5?cjc=nmqbyga">classroom</a>';
    }

    public function getSubjectName(): string
    {
        return 'subject.history';
    }
}
