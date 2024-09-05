<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Grinchuk;

class ForeignLiterature extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Grinchuk());
    }

    public function getSubjectName(): string
    {
        return 'Иностранная литература';
    }
}
