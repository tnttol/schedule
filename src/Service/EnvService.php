<?php declare(strict_types=1);

namespace App\Service;

final readonly class EnvService
{
    public function __construct(private string $env)
    {
    }

    public function getEnv(): string
    {
        return $this->env;
    }

    public function isDevEnv(): bool
    {
        return $this->env === 'dev';
    }
}
