<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Nozdrachova;

class NaturalScience extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Nozdrachova());
    }

    public function getSubjectName(): string
    {
        return 'subject.natural_science';
    }
}
