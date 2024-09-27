<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Kurochka implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Kurochka';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/74993907385?pwd=ISUtLF6eHSrF8HcfbGG5bOdoKqabqW.1">zoom</a>',
            '<a href="https://classroom.google.com/c/NzEwMzU1NjIxNTQ3?cjc=uz4rfec">classroom</a>'
        ]);
    }
}
