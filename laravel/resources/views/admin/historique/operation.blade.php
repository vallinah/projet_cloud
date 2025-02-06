@extends('admin.layout.layout-admin')
@section('content')
<div class="contains">
    <h1 id="page">Validation des Transactions</h1>
    <form method="GET" action="{{ route('operations') }}">
        <label for="date_debut">Date Début:</label>
        <input type="date" id="date_debut" name="date_debut" value="{{ request('date_debut') }}">

        <label for="date_fin">Date Fin:</label>
        <input type="date" id="date_fin" name="date_fin" value="{{ request('date_fin') }}">

        <label for="user_id">Utilisateur:</label>
        <select id="user_id" name="user_id">
            <option value="">Tous</option>
            @foreach($users as $user)
                <option value="{{ $user->user_id }}" {{ request('user_id') == $user->user_id ? 'selected' : '' }}>
                    {{ $user->first_name }}
                </option>
            @endforeach
        </select>

        <label for="crypto_id">Cryptomonnaie:</label>
        <select id="crypto_id" name="crypto_id">
            <option value="">Toutes</option>
            @foreach($cryptocurrencies as $crypto)
                <option value="{{ $crypto->crypto_id }}" {{ request('crypto_id') == $crypto->crypto_id ? 'selected' : '' }}>
                    {{ $crypto->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filtrer</button>
    </form>
    <div class="classement">
        <table>
            <thead>
                <tr>
                    <th>RANG</th>
                    <th>UTILISATEUR</th>
                    <th>CRYPTO</th>
                    <th>COURS</th>
                    <th>NOMBRE</th>
                    <th>TYPE</th>
                    <th>DATE DE MOUVEMENT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($operations as $index => $operation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <a href="{{ route('operations.user', ['id' => $operation->user_id]) }}">
                                {{ $operation->user_name }}
                            </a>
                        </td>
                        <td>{{ $operation->crypto_name }}</td>
                        <td>{{ number_format($operation->cours, 2, ',', ' ') }} USD</td>
                        <td>{{ $operation->nombre }}</td>
                        <td>{{ $operation->achat == 1 ? 'Achat' : 'Vente' }}</td>
                        <td>{{ \Carbon\Carbon::parse($operation->date_mouvement)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection