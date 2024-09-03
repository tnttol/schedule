<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Priroda;

class NaturalScience extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Priroda());
    }

    public function getSubjectName(): string
    {
        return 'Познаём природу';
    }
}