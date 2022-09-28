<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class CountAlphaDigits extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:4';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Count number of Alphabets and Digits from a string';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info($this->description);
        $this->info('see ' . get_class($this) . '.php');
        
       $string = $this->ask('Enter a string');

       $this->info('Input: ' . $string);
       $this->info('Output: ');
       $this->info(var_dump($this->countLettersAndDigits($string)));
    }

    public function clean($string)
    {
        return str_replace(' ','', $string);
    }

    public function countLettersAndDigits($string)
    {
        $digits = 0;

        $cleaned = $this->clean($string);

        for ($i=0; $i < strlen($cleaned); $i++) { 
            if(is_numeric($cleaned[$i])) { $digits++; }
        }

        return [
            'Letters' => strlen($cleaned) - $digits,
            'Digits' => $digits
        ];
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
