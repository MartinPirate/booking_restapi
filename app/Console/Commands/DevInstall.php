<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:install {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('checking system status');
        $this->warn('migration started...');
        $this->call('migrate:fresh');
        $this->info('migration done...');
        $this->warn('Seeding');
        $this->call('db:seed');
        $this->info('Done! Yay');
    }
}
