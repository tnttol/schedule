<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Bogdanova;

class Geography extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Bogdanova());
    }

    public function getSubjectName(): string
    {
        return 'subject.geography';
    }
}
