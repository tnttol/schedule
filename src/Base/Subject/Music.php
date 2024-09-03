<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Muzika;

class Music extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Muzika());
    }

    public function getSubjectName(): string
    {
        return 'Музыка';
    }
}
