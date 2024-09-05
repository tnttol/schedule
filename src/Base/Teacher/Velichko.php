<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Velichko implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Величко Олена Михайлівна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'no information'
        ]);
    }
}
