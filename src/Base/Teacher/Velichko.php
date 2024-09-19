<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Velichko implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Velichko';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/73760619821?pwd=AW3ykRRBzf4rdH8YbQMOztu9BABCcU.1">zoom</a>',
            'код: 7UXnj8',
        ]);
    }
}
