<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Litvinova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Литвинова Ксения Александровна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://us05web.zoom.us/j/4119630528?pwd=MzFkcHlSVU9takFDMkdTMHBVYVVBUT09',
            'код: 2Vn6zt'
        ]);
    }
}
