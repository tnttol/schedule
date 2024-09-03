<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Belostotskaya;

class Technologies extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Belostotskaya());
    }

    public function getSubjectName(): string
    {
        return 'Технологии';
    }
}
