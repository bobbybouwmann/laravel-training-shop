<?php

namespace Bobbybouwmann\Jokes;

use Bobbybouwmann\Jokes\Dto\Joke;
use GuzzleHttp\Client;

class Jokes
{
	private $client;

	public function __construct(Client $client)
    {
        $this->client = $client;
    }

	public function generate(): Joke
	{
		$response = $this->client->get('https://icanhazdadjoke.com');

		$body = json_decode((string) $response->getBody(), true);

		return new Joke($body['joke']);
	}
}
