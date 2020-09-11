<?php namespace DariusIII\L5Fixtures\Commands;

use Illuminate\Console\Command;
use DariusIII\L5Fixtures\Exceptions\FixturesException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use \DB;
use \Fixtures;

class DownCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'fixtures:down {--database=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy all records on the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $database = $this->option('database');

        if ($database !== null) {
            DB::setDefaultConnection($database);
        }

        Fixtures::down();
    }
}