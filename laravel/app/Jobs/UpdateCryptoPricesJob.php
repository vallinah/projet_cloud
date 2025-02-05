<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Cryptocurrency;

class UpdateCryptoPricesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $cryptocurrencies = Cryptocurrency::all();

        foreach ($cryptocurrencies as $crypto) {
            // Générer un prix aléatoire basé sur le prix actuel
            $currentPrice = $crypto->current_price;
            $variation = rand(-500, 500) / 100; // Variation de -5% à +5%
            $newPrice = max(0, $currentPrice + ($currentPrice * ($variation / 100)));

            // Mettre à jour le prix
            $crypto->update([
                'current_price' => $newPrice,
                'updated_date' => now(),
            ]);
        }
    }
}
