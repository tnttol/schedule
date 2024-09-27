<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Dontsov implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Dontsov';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us05web.zoom.us/j/82368183253?pwd=eb2ZXf54K15okGS2oVoBFATMPpiB1O.1">zoom</a>',
            'код: 12345678',
            '<a href="https://classroom.google.com/c/NzEwMzUwMzc5NjMw?cjc=pwh3uod">classroom</a>'
        ]);
    }
}
