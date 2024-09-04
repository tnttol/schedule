<?php

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Zarlit implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Инна Дмитриевна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '-',
            'код: -'
        ]);
    }
}
