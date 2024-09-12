<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Velichko implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Velichko';
    }

    public function getInfo(): string
    {
        return '';
    }
}
