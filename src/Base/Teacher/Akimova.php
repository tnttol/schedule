<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Akimova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Акимова Надежда Анатольевна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://us05web.zoom.us/j/6374194237?pwd=FncPpnjgpZ8noe4yAvYScY7OPyayIn.1',
            'код: 333'
        ]);
    }
}
