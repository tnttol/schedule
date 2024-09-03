<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Fizruk;

class PhysicalTraining extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Fizruk());
    }

    public function getSubjectName(): string
    {
        return 'Физкультура';
    }
}
