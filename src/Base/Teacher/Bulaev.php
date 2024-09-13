<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Bulaev implements TeacherInterface
{

    public function getFullName(): string
    {
        return 'teacher.Bulaev';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://calendar.app.google/JWfBryq6A7tYfAn27">google calendar</a>',
        ]);
    }
}
