<?php

namespace App\Services;

use App\Contracts\GithubUserRepo;

use App\Transformers\GithubUserTransformer;
use Exception;

class GithubUserService
{
    private GithubUserRepo $githubUserRepo;
    private $transformer;

    public function __construct(GithubUserRepo $githubUserRepo, GithubUserTransformer $transformer)
    {
        $this->githubUserRepo = $githubUserRepo;
        $this->transformer = $transformer;
    }
    public function getUser($username)
    {
        try {
            $user = $this->githubUserRepo->getUser($username);
            return ['status' => 'success', 'user' => $this->transformer->transform($user)];
        } catch (Exception $ex) {
            return ['status' => 'failure', 'message' => $ex->getMessage()];
        }
    }
}
