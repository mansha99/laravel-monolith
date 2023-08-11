<?php

namespace App\Http\Controllers;

use App\Http\Requests\GithubUserRequest;
use App\Services\GithubUserService;

class GithubUserController extends Controller
{
    private GithubUserService $githubUserService;
    public function __construct(GithubUserService $githubUserService)
    {
        $this->githubUserService = $githubUserService;
    }
    public function getUser(GithubUserRequest $request)
    {
        $data = $request->validated();
        $result = $this->githubUserService->getUser($data['username']);
        return response()->json($result);
    }
}
