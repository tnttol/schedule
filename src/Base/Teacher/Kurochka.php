<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Kurochka implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Курочка Андрей Александрович';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '',
            'код: '
        ]);
    }
}
