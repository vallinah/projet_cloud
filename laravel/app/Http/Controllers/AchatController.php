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

class AchatController extends Controller
{

    public function index()
    {
        $title = "Validation achat";
        $query = DB::table('mouvement_crypto')
            ->join('cryptocurrencies', 'mouvement_crypto.crypto_id', '=', 'cryptocurrencies.crypto_id')
            ->select('mouvement_crypto.*', 'cryptocurrencies.name as crypto_name')
            ->where('achat', 1)
            ->where('is_valid', false);
        $achats = $query->get();
        return view('admin.validation.achat', compact('title', 'achats'));
    }

    public function validerAchat($id)
    {
        // Vérifiez si l'achat existe
        $achat = DB::table('mouvement_crypto')->where('id_mouvement_crypto', $id)->first();

        if (!$achat) {
            // Si l'achat n'existe pas, retournez un message d'erreur
            return redirect()->route('achats')->with('error', 'achat non trouvée.');
        }

        // Mettez à jour la achat pour la marquer comme validée
        DB::table('mouvement_crypto')
            ->where('id_mouvement_crypto', $id)
            ->update(['is_valid' => true]);

        // Optionnel : Vous pouvez aussi mettre à jour d'autres informations comme la date de validation, etc.
        // Exemple : DB::table('mouvement_crypto')->where('id', $id)->update(['validation_date' => now()]);

        // Redirigez avec un message de succès
        return redirect()->route('achats')->with('success', 'achat validée avec succès.');
    }


}