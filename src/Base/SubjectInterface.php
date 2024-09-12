<?php declare(strict_types=1);

namespace App\Base;

interface SubjectInterface
{
    public function getSubjectName(): string;
    public function addTeacher(TeacherInterface $teacher);
    public function getInfo(): string;
    /** @return array<TeacherInterface> */
    public function getTeachers(): array;
}
