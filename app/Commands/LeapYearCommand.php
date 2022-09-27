<?php

namespace App\Commands;

use DateTime;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class LeapYearCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'leapyear:check ';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Check if a year is a leap year';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $year = $this->ask('Enter a year');

       $this->info('Input: ' . $year);
       $this->info('Output: ' . $this->output($this->isLeapYear($year)));
    }

    public function isLeapYear($year)
    {
        $date = new DateTime();
        $date->setDate($year, 1, 1);

        return (boolean) $date->format('L');
    }

    public function output($isLeapYear)
    {
        return ($isLeapYear) ? 'Leap Year' : 'Not a Leap year';
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
