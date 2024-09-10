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
            'https://us04web.zoom.us/j/72783888092?pwd=z4IxsyvefmxaVGaxS70MX3uRdYNCVN.1',
            'код: 4TgD9b'
        ]);
    }
}
