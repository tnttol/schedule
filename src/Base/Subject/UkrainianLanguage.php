<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Skochko;

class UkrainianLanguage extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Skochko());
    }

    public function getSubjectName(): string
    {
        return 'subject.ukrainian_language';
    }
}
