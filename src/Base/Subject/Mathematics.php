<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Litvinova;

class Mathematics extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Litvinova());
    }

    public function getInfo(): string
    {
        return 'https://classroom.google.com/c/NzEwNDg1MTI3ODcy/a/NzEwODMzNTMxMjcz/details';
    }

    public function getSubjectName(): string
    {
        return 'subject.mathematics';
    }
}
