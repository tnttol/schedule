<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Grinchuk implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Grinchuk';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://meet.google.com/htw-xyai-wce'
        ]);
    }
}
