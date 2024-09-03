<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Risovanie;

class Drawing extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Risovanie());
    }

    public function getSubjectName(): string
    {
        return 'Рисование';
    }
}
