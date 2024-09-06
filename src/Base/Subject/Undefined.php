<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Unknown;

class Undefined extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Unknown());
    }

    public function getSubjectName(): string
    {
        return 'subject.unknown';
    }
}
