<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Angl;

class EnglishLanguage extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Angl());
    }

    public function getSubjectName(): string
    {
        return 'Английский язык';
    }
}
