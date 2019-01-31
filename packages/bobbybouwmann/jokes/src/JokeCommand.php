<?php

namespace Bobbybouwmann\Jokes;

use Illuminate\Console\Command;

class JokeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'joke:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a random joke to the command line';

    /**
     * @var Jokes
     */
    private $jokes;

    /**
     * Create a new command instance.
     *
     * @param Jokes $jokes
     */
    public function __construct(Jokes $jokes)
    {
        parent::__construct();

        $this->jokes = $jokes;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('# Generating a joke :tada:');
        $this->info((string) $this->jokes->generate());
    }
}
