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
            'https://us04web.zoom.us/j/74993907385?pwd=ISUtLF6eHSrF8HcfbGG5bOdoKqabqW.1',
        ]);
    }
}
