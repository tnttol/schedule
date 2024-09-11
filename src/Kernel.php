<?php declare(strict_types=1);

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function boot(): void
    {
        parent::boot();

        date_default_timezone_set($this->getContainer()->getParameter('timezone'));
        locale_set_default($this->getContainer()->getParameter('default_locale'));
    }
}

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst(string $string, string $enc = 'UTF-8'): string
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc)
            . mb_substr($string, 1, mb_strlen($string, $enc), $enc)
        ;
    }
}
