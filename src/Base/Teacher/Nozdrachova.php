<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Nozdrachova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Ноздрачёва Дарья Павловна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '',
            'код: '
        ]);
    }
}
