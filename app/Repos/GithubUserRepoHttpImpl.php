<?php

namespace App\Repos;

use App\Contracts\GithubUserRepo;
use Exception;
use Illuminate\Support\Facades\Http;

class GithubUserRepoHttpImpl implements GithubUserRepo
{
    public function getUser(string $username)
    {
        $response = Http::get('https://api.github.com/users/' . $username);
        if ($response->status() == 404) {
            throw new Exception("User " . $username . " does not exist");
        }
        return $response->json();
    }
}
