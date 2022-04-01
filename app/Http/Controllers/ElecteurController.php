<?php

namespace App\Http\Controllers;

use App\Models\electeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ElecteurController extends Controller
{
    //
    function add (Request $req){
        $electeurs = new Electeur();
        $electeurs->cni=$req->cni;
        $electeurs->num_electeur=$req->num_electeur;
        $electeurs->nom=$req->nom;
        $electeurs->prenom=$req->prenom;
        $electeurs->datedenaissance=$req->datedenaissance;
        $electeurs->adresse=$req->adresse;
        $electeurs->lieudevote=$req->lieudevote;
        $electeurs->bureau=$req->bureau;
        $electeurs->circonscription=$req->circonscription;
        $electeurs->password=bcrypt($req->password);
        $result=$electeurs->save();

        if($result)
        {
            return ["Result"=>"Les données on été sauvegardées avec succès!"];
        }
        else
        {
            return ["Result"=>"La sauvegarde a échoué!"];
        }
    }
    function login (Request $req) {
        $req->validate([
            "cni"=>['required'],
            "password"=>['required'],
        ]);

        $user = Electeur::whereCni($req->cni)->first();

        if($user){
            if(Hash::check($req->password, $user->password)){

                $token = $user->createToken("Token electeur");
                return response()->json([
                    "token" => $token,
                    "electeur" => $user
                ], 200);
            }
            return response()->json([
                "message" => "Mot de passe invalide."
            ], 422);
        }
        else{
            return response()->json([
                "message" => "L'utilisateyr n'existe pas"
            ], 422);
        }
    }
}
