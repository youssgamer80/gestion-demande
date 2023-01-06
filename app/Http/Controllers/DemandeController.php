<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Utilisateur;
class DemandeController extends Controller
{
    //cette methode permet d'enregistrer une nouvelle demande
    public function createDemande(Request $request){

        $dataRegister = $request->all();

        $code = uniqid();

        $nom = $request->demande["nom"];

        $prenom = $request->demande["prenom"];

        $email = $request->demande["email"];

        $telephone = $request->demande["telephone"];

        $date_naissance = $request->demande["date_naissance"];

        $profession = $request->demande["profession"];
        
        $demande = $request->demande;

        $utilisateur = Utilisateur::create([

            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "telephone" => $telephone,
            "date_naissance" => $date_naissance,
            "profession" => $profession
        ]);

        $demande = Demande::create([

            "code" => $code,
            "demande"=>$demande,
            "utilisateur_id_fk"=>$utilisateur->id
        ]);
        return response()->json([

            "status" => "success",
            "message" => "votre demande a ete prise en compte, un sms de confirmation vous sera envoye",
            "data" => $demande
        ]);
    }

    //cette methode permet de ramener la liste des toutes demandes
    public function listeDemande(Request $request){

        $demandes = Demande::all([]);

        return response()->json([

            "status" => "success",
            "message" => "la liste de toutes les demandes",
            "data" => $demandes
        ]);
    }

    
}