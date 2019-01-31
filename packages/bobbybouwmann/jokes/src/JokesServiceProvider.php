<?php

namespace Bobbybouwmann\Jokes;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class JokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('command.jokes:generate', JokeCommand::class);

        $this->commands(['command.jokes:generate']);
    }

    public function register()
    {
        $this->app->singleton(Jokes::class, function ($app) {
            $client = new Client([
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            return new Jokes($client);
        });
    }

    public function provides()
    {
        return [
            'command.jokes:generate',
        ];
    }
}
