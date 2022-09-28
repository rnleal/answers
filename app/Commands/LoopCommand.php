<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class LoopCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:3';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Loop over a json data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info($this->description);
        $this->info('see ' . get_class($this) . '.php');
        $this->info('');
        
        foreach ($this->data() as $data) {
            $this->info(
                $data->name . 
                ' --> ' .  
                $data->age .
                ' --> ' .
                $data->school
            );
        }
    }

    public function data()
    {
        return   json_decode(file_get_contents('app/data/data.json'));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
