<?php declare(strict_types=1);

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Belostotskaya implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'teacher.Belostotskaya';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            '<a href="https://us04web.zoom.us/j/78074571621?pwd=LLLVrEG9FhfFjMxK7gcO7kcHcQ7ObW.1">zoom</a>',
            'код: hqh6zH'
        ]);
    }
}
