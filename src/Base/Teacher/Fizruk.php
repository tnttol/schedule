<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Fizruk implements TeacherInterface
{

    public function getFullName(): string
    {
        return 'Олег Алексеевич';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://calendar.app.google/t71RMUaSvFUHPUDq9'
        ]);
    }
}
