<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class CalculateAndAddPercentageCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:6';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Remove 25% from every number in the
    list except the smallest number, and adds the total amount removed to the smallest
    number.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $group = [4,1,4];
        
       
        
    }

    public function remove25PercentAndAddToLowest($value, $lowest)
    {
        return ($value * .25) + $lowest;
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
