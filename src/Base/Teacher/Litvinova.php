<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Litvinova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Litvinova';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us05web.zoom.us/j/4119630528?pwd=MzFkcHlSVU9takFDMkdTMHBVYVVBUT09">zoom</a>',
            'код: 2Vn6zt'
            //'<a href="">classroom</a>'
        ]);
    }
}
