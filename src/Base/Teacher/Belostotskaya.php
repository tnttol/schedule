<?php

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Belostotskaya implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Белостоцкая Ольга Николаевна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '',
            'код: '
        ]);
    }
}
