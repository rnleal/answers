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
        $group = [16, 10, 8];
        $lowest = min($group);

        $final = [];
        foreach ($group as $value) {
            $final[] = ($value == $lowest)
                ? $lowest + $this->getTotal($group)
                : $value - $this->getPercentage($value);
        }

        $this->info('INPUT: ' . implode(',', $group));
        $this->info('OUTPUT: ' . implode(',', $final));
    }

    public function getPercentage($value, $percentage = .25)
    {
        return $value * $percentage;
    }

    public function getTotal($array)
    {
        $result = 0;
        $lowest = min($array);

        foreach ($array as $value) {
            if ($value != $lowest) {
                $result += $this->getPercentage($value);
            }
        }

        return $result;
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
