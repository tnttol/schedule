<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Grinchuk;

class ForeignLiterature extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Grinchuk());
    }

    public function getInfo(): string
    {
        return 'https://classroom.google.com/c/NzExMDE2NDgwMzk4?cjc=zpgdlh6';
    }

    public function getSubjectName(): string
    {
        return 'subject.foreign_literature';
    }
}
