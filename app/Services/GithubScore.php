<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class GithubScore
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Generate the GitHub score for a specific username.
     *
     * @param $username
     * @return int
     */
    public function forUsername($username): int
    {
        return $this->calculateScore($username);
    }

    /**
     * Calculate the score.
     *
     * @param $username
     * @return int
     */
    private function calculateScore($username): int
    {
        return $this->eventsForUsername($username)->pluck('type')->map(function ($eventType) {
            return $this->lookupScore($eventType);
        })->sum();
    }

    /**
     * Fetch events for a specific username.
     *
     * @param $username
     * @return Collection
     */
    private function eventsForUsername($username): Collection
    {
        $url = sprintf('https://api.github.com/users/%s/events', $username);

        $response = $this->client->get($url);

        return collect(json_decode((string) $response->getBody(), true));
    }

    /**
     * Determine the score based on the given event type.
     *
     * @param $eventType
     * @return int
     */
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
