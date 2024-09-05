<?php

namespace App\Base\Teacher;

use App\Base\TeacherInterface;

class Belostotskaya implements TeacherInterface
{
    public function getFullName(): string
    {
        return 'Белостоцкая Ольга Николаевна';
    }

    public function getInfo(): string
    {
        return implode(PHP_EOL, [
            'https://us04web.zoom.us/j/78074571621?pwd=LLLVrEG9FhfFjMxK7gcO7kcHcQ7ObW.1',
            'код: hqh6zH'
        ]);
    }
}
