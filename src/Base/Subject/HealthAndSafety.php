<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\SubjectInterface;
use App\Base\Teacher\Velichko;

class HealthAndSafety extends AbstractSubject implements SubjectInterface
{
    public function __construct()
    {
        $this->addTeacher(new Velichko());
    }

    public function getSubjectName(): string
    {
        return 'subject.health_and_safety';
    }
}
