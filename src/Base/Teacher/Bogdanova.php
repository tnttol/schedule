<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Bogdanova implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Bogdanova';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/72832921772?pwd=ZP7ZKMRDhIMZ7a7hb6qfAUUcNLQmB2.1">zoom</a>',
            'код: 2C8zB4',
            //'<a href="">classroom</a>'
        ]);
    }
}
