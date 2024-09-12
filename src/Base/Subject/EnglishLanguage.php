<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Abelentseva;

class EnglishLanguage extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Abelentseva());
    }

    public function getInfo(): string
    {
        return 'https://classroom.google.com/c/NzA4NTYzNDk2MTkx?cjc=ik4t6y6';
    }

    public function getSubjectName(): string
    {
        return 'subject.english_language';
    }
}
