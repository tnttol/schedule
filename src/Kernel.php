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
