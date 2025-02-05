@extends('user.layout.layout-user')
@section('content')
<div class="contains">
    <h1 id="page">Mon Portefeuille Crypto</h1>
    <div class="dash">
        <div class="card" style="background-color: rgb(0, 255, 255);">
            <h5 class="card-title">Valeur totale: {{ number_format($total_portfolio_value, 2) }} USD</h5>
        </div>
    </div>
    <div class="classement">
        <table>
            <thead>
                <tr>
                    <th>Cryptomonnaie</th>
                    <th>Symbole</th>
                    <th>Quantité</th>
                    <th>Prix actuel</th>
                    <th>Valeur totale</th>
                </tr>
            </thead>
            <tbody id="crypto-tbody">
                @foreach($wallets as $wallet)
                    <tr>
                        <td>{{ $wallet['crypto_name'] }}</td>
                        <td>{{ $wallet['symbol'] }}</td>
                        <td>{{ number_format($wallet['amount'], 8) }}</td>
                        <td>${{ number_format($wallet['current_price'], 2) }}</td>
                        <td>${{ number_format($wallet['total_value'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection