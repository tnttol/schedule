<?php

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Grinchuk implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Гринчук Светлана';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://meet.google.com/htw-xyai-wce'
        ]);
    }
}
