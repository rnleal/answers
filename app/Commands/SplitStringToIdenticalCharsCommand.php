<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class SplitStringToIdenticalCharsCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:7';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Split strings to an array of identical characters';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('This will split the numbers into identical clusters');
        $input = $this->ask('Enter random numbers...');

        $arr = str_split($input);

        $formulation = array_count_values($arr);

        $final = [];

        foreach ($formulation as $value => $occurences) {
            array_push($final, str_repeat($value, $occurences));
        }

        $this->info('INPUT: ' . $input);
        $this->info('OUTPUT: ' . implode(',', $final));
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
