<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Mishchenko implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Mishchenko';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'no information'
        ]);
    }
}
