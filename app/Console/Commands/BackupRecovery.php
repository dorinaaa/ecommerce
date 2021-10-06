<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackupRecovery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:recover {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recovers backup';

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
     *
     */
    public function handle()
    {
        DB::unprepared(file_get_contents(storage_path() . '\app\backup\\'.$this->argument('file') .'.sql'));
        $this->info('Backup recovered successfully');
    }
}
