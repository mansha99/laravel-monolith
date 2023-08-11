<?php

namespace App\Console\Commands;

use App\Services\GithubUserService;
use Illuminate\Console\Command;

class GetGithubUserCommand extends Command
{
    protected $signature = 'app:github-user {username}';

    protected $description = 'Use this command to get Github user details';

    private GithubUserService $githubUserService;
    public function __construct(GithubUserService $githubUserService)
    {
        parent::__construct();
        $this->githubUserService = $githubUserService;
    }
    public function handle()
    {

        $result = $this->githubUserService->getUser($this->argument('username'));
        if ($result['status'] == "success") {
            $this->info('Bio: ' . $result['user']['bio']);
            $this->info('User is ' . $result['user']['group']);
            $this->info('More details at ' . $result['user']['html_url']);
        } else {
            $this->error('User ' . $this->argument('username') . ' does not exist');
        }
    }
}
