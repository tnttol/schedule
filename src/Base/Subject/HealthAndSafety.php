<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Zdorovie;

class HealthAndSafety extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Zdorovie());
    }

    public function getSubjectName(): string
    {
        return 'Здоровье и безопасность';
    }
}
