<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Dontsov implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Донцов Ігор Анатолійович';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '',
            'код: '
        ]);
    }
}
