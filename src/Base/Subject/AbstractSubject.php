<?php declare(strict_types=1);

namespace App\Base\Subject;

use App\Base\TeacherInterface;

class AbstractSubject
{
    private array $teachers;

    public function addTeacher(TeacherInterface $teacher): self
    {
        $this->teachers[] = $teacher;

        return $this;
    }

    /** @return array<TeacherInterface> */
    public function getTeachers(): array
    {
        return $this->teachers;
    }
}
