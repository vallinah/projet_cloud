<?php

namespace App\Http\Controllers;

use App\Models\MouvementFond;
use Illuminate\Http\Request;

class MouvementFondController extends Controller
{
    // Récupérer tous les mouvements
    public function index()
    {
        $mouvements = MouvementFond::with('user')->get();
        return response()->json($mouvements);
    }

    // Ajouter un nouveau mouvement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'montant_retrait' => 'nullable|numeric|min:0',
            'montant_depot' => 'nullable|numeric|min:0',
            'user_id' => 'required|string|exists:users,user_id',
        ]);

        $mouvement = MouvementFond::create($validated);

        return response()->json([
            'message' => 'Mouvement créé avec succès.',
            'mouvement' => $mouvement,
        ], 201);
    }
    public function getByUserId($user_id)
    {
        $mouvements = MouvementFond::where('user_id', $user_id)->get();

        if ($mouvements->isEmpty()) {
            return response()->json(['message' => 'Aucun mouvement trouvé pour cet utilisateur.'], 404);
        }

        return response()->json($mouvements);
    }


}


