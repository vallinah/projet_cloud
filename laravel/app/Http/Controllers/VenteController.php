<?php

namespace App\Http\Controllers;

use App\Models\CryptoWallet;
use App\Models\Cryptocurrency;
use App\Models\Commission;
use App\Models\MouvementCrypto;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VenteController extends Controller
{

    public function index()
    {
        $title = "Validation vente";
        $query = DB::table('mouvement_crypto')
            ->join('cryptocurrencies', 'mouvement_crypto.crypto_id', '=', 'cryptocurrencies.crypto_id')
            ->select('mouvement_crypto.*', 'cryptocurrencies.name as crypto_name')
            ->where('vente', 1)
            ->where('is_valid', false);
        $ventes = $query->get();
        return view('admin.validation.vente', compact('title', 'ventes'));
    }

    public function validerVente($id)
    {
        // Vérifiez si l'achat existe
        $vente = DB::table('mouvement_crypto')->where('id_mouvement_crypto', $id)->first();

        if (!$vente) {
            // Si l'achat n'existe pas, retournez un message d'erreur
            return redirect()->route('ventes')->with('error', 'Vente non trouvée.');
        }

        // Mettez à jour la vente pour la marquer comme validée
        DB::table('mouvement_crypto')
            ->where('id_mouvement_crypto', $id)
            ->update(['is_valid' => true]);

        // Optionnel : Vous pouvez aussi mettre à jour d'autres informations comme la date de validation, etc.
        // Exemple : DB::table('mouvement_crypto')->where('id', $id)->update(['validation_date' => now()]);

        // Redirigez avec un message de succès
        return redirect()->route('ventes')->with('success', 'Vente validée avec succès.');
    }


}