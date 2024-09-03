<?php declare(strict_types=1);

namespace App\Base;

interface TeacherInterface
{
    public function getFullName(): string;
    public function getInfo(): string;
}
