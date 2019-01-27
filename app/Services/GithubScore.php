<?php

namespace App\Services;

use Illuminate\Support\Collection;

class GithubScore
{
    public function forUsername($username): int
    {
        return $this->calculateScore($username);
    }

    private function calculateScore($username): int
    {
        return $this->eventsForUsername($username)->pluck('type')->map(function ($eventType) {
            return $this->lookupScore($eventType);
        })->sum();
    }

    private function eventsForUsername($username): Collection
    {
        $context = stream_context_create([
            'http' => [
                'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) '
                    . 'Chrome/50.0.2661.102 Safari/537.36',
            ],
        ]);

        $url = sprintf('https://api.github.com/users/%s/events', $username);

        return collect(json_decode(file_get_contents($url, false, $context), true));
    }

    private function lookupScore($eventType): int
    {
        return collect([
            'PushEvent' => 5,
            'CreateEvent' => 4,
            'IssuesEvent' => 3,
            'CommitCommentEvent' => 2,
        ])->get($eventType, 1);
    }
}
