<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class RemoveDuplicateCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:5';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Remove duplicate question marks and exclamation marks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sentence = $this->choice('Choose sentence to test', [
            'Ana? Why is wrong??????',
            'Ana! Why is wrong!!!!'
        ]);

        $word = $this->deduplicate($sentence);

        $this->info('INPUT: ' . $sentence);
        $this->info('OUTPUT: ' . $word);
        
    }

    public function deduplicate($string)
    {
        $string =  array_reverse(explode(' ', $string));
        $lastword = implode(
            array_unique(
                str_split($string[0])
            )
        );

        $string[0] = $lastword;

        return implode(' ', array_reverse($string));
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
