<?php

namespace App\Http\Controllers;

use App\Models\CryptoWallet;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {

        $title = "Mon Portfolio"; // Définir le titre

        $wallets = CryptoWallet::with('cryptocurrency')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($wallet) {
                return [
                    'crypto_name' => $wallet->cryptocurrency->name,
                    'symbol' => $wallet->cryptocurrency->symbol,
                    'amount' => $wallet->amount,
                    'current_price' => $wallet->cryptocurrency->current_price,
                    'total_value' => $wallet->amount * $wallet->cryptocurrency->current_price
                ];
            });

        $total_portfolio_value = $wallets->sum('total_value');

        return view('user.portfolio.index', compact('title', 'wallets', 'total_portfolio_value'));
    }
}