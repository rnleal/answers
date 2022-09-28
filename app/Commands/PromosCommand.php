<?php

namespace App\Commands;

use App\Actions\Promos;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class PromosCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'exam:1';
    protected $promos;
    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Check which promo is better';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info($this->description);
        $this->info('see ' . get_class($this) . '.php');
        
        $promo_1['quantity'] = $this->ask('First promo quantity...');
        $promo_1['price'] = $this->ask('First promo price...');

        $promo_2['quantity'] = $this->ask('Second promo quantity...');
        $promo_2['price'] = $this->ask('Second promo price...');

        $result = Promos::make()
                    ->addPromo($promo_1)
                    ->addAnotherPromo($promo_2)
                    ->evaluate();

        $this->info($result);
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
