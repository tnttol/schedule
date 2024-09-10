<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Unknown;

class UkrainianLiterature extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Unknown());
    }

    public function getSubjectName(): string
    {
        return 'subject.ukrainian_literature';
    }
}
