<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Bulaev;

class PhysicalTraining extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Bulaev());
    }

    public function getSubjectName(): string
    {
        return 'subject.physical_training';
    }
}
