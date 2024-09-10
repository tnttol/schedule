<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Unknown implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'no information';
    }

    public function getInfo(): string
    {
        return '';
    }
}
