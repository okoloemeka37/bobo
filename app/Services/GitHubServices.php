<?php

namespace App\Services;

use GuzzleHttp\Client;

class GitHubServices
{
    protected $client;
    protected $username;
    protected $repository;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->username = env('GITHUB_USERNAME');
        $this->repository = env('GITHUB_REPO');
        $this->token = env('GITHUB_TOKEN');
    }

    public function uploadFile($filePath, $content)
    {
        $url = "https://api.github.com/repos/{$this->username}/{$this->repository}/contents/{$filePath}";
        $response = $this->client->put($url, [
            'headers' => [
                'Authorization' => 'token ' . $this->token,
                'Accept' => 'application/vnd.github.v3+json',
            ],
            'json' => [
                'message' => 'Upload file via API',
                'content' => base64_encode($content),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
