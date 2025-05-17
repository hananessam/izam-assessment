<?php

namespace App\Repositories\Contracts;

interface AuthInterface
{
    public function login(array $credentials): array;
    public function logout(): void;
}