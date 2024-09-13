<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Skochko implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Skochko';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/72783888092?pwd=z4IxsyvefmxaVGaxS70MX3uRdYNCVN.1">zoom</a>',
            'код: 4TgD9b',
            //'<a href="">classroom</a>'
        ]);
    }
}
