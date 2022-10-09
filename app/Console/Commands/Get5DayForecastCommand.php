<?php

namespace App\Console\Commands;

use App\Services\Forecasts\OpenWeatherMap\Interfaces\Get5DayForecastInterface;
use Illuminate\Console\Command;

class Get5DayForecastCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forecast:get-5-day {--test=} {--city=}';

    private Get5DayForecastInterface $forecastService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns the 5 day weather forecast for all cities on the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Get5DayForecastInterface $forecastService)
    {
        parent::__construct();
        $this->forecastService = $forecastService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    : int
    {
//        echo ($test = $this->option('test')) . "\n" . gettype($test) . "\n";
        $test = $this->option('test');

        if (is_string($forecasts = $this->forecastService->get($this->option('city')))) {
            if (!$test) {
                echo $forecasts . '<br>';
            }

            return 1;
        }

        if (!$test) {
            var_dump($forecasts);
        }

        return 0;
    }
}
