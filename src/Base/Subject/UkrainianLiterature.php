<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Akimova;

class UkrainianLiterature extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Akimova());
    }

    public function getSubjectName(): string
    {
        return 'Украинская литература';
    }
}
