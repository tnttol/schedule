<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Abelentseva implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Abelentseva';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/77741182923?pwd=oVqQSrv6kQHlY4KmaKx0UuHTMfjROO.1">zoom</a>',
            'код: 9ukTwK',
            '<a href="https://classroom.google.com/c/NzA4NTYzNDk2MTkx?cjc=ik4t6y6">classroom</a>',
        ]);
    }
}
