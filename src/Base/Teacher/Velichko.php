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
        return implode(PHP_EOL, [
            //'<a href="https://us04web.zoom.us/j/73760619821?pwd=AW3ykRRBzf4rdH8YbQMOztu9BABCcU.1">zoom</a>',
            //'код: 7UXnj8',
            //'<a href="https://us04web.zoom.us/j/71520206702?pwd=XsGCcWQspfEBEAAgPny3ihcga50vOG.1">zoom</a>',
            //'код: 8JYYGF',
            //'<a href="https://us04web.zoom.us/j/74377047091?pwd=O1vy12L9VpVHwubOwTOFLRBnCQRXpO.1">zoom</a>',
            //'код: 4A1GjZ',
        ]);
    }
}
