<?php

namespace App\Contracts;

interface GithubUserRepo
{
    public function getUser(string $username);
}