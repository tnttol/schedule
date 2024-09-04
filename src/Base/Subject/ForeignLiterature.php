<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Zarlit;

class ForeignLiterature extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Zarlit());
    }

    public function getSubjectName(): string
    {
        return 'Иностранная литература';
    }
}
