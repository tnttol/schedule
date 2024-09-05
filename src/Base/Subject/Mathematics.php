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

    public function getSubjectName(): string
    {
        return 'subject.mathematics';
    }
}
