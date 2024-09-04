<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Abelentseva implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Абеленцева Алина Александровна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://us04web.zoom.us/j/77741182923?pwd=oVqQSrv6kQHlY4KmaKx0UuHTMfjROO.1',
            'код: 9ukTwK'
        ]);
    }
}
