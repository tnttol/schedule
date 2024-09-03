<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Dontsov;
use App\Base\Teacher\Kurochka;

class Informatics extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Kurochka());
        $this->addTeacher(new Dontsov());
    }

    public function getSubjectName(): string
    {
        return 'Информатика';
    }
}
