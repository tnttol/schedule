<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Nozdrachova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Nozdrachova';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/7787554364?pwd=WiEG1ah8N1oDW9ZcfC4Iv4jAaWRgCj.1">zoom</a>',
            'код: 111',
        ]);
    }
}
