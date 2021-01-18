<?php

namespace App\Http\Controllers;
use App\Inscription;
use App\Upload;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PDF;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    
	// register user  inscription 
	public function create(Request $request){
		
		$messages = [
			'nom.max' => 'Votre prénom ne peut avoir plus de :max caractères.',
			'nom.min' => 'Votre nom ne peut avoir moins de :min caractères.',
			'nom.required' => 'Vous devez saisir votre prénom.',
			'age.required' => 'vous devez saisir votre age',
			'age.regex' => 'votre  doit etre age est un nombre entier',

			
		];
		
		$rules = [
			'nom' => 'required|string|min:5|max:55',
			'adresse' => 'required|string|min:3|max:255',
            'age' => 'required|string|max:5|regex:/[0-9]{1,3}/',
            'pays' => 'required|string|max:30'
		];



		$validator = Validator::make($request->all(),$rules,$messages);
		if ($validator->fails()) {
			return redirect('inscription')
			->withInput()
			->withErrors($validator);
		}
		else{
			$data = $request->input();
			
			$nom = trim($data['nom']);
			$nom = strip_tags($nom);
			$adresse = trim($data['adresse']);
			$adresse = stripslashes(strip_tags($adresse));
			try{
				$inscription = new Inscription;
                $inscription->nom = $nom;
                $inscription->adresse = $adresse;
				$inscription->age = $data['age'];
				$inscription->pays = $data['pays'];
				$inscription->save();
				return redirect('inscription')->with('status',"les informations sont enregsitrées");
			}
			catch(Exception $e){
				return redirect('inscription')->with('failed',"echec");
			}
		}
         }
	
	// afficher des users dont l'age est inférieur à 40 ans
	// count sur le nombre de user enregsitré

              public function insert(){

		$liste = Inscription::where('age','<',40)->get();
		$counts = Inscription::count();
        return view('inscription',  compact('liste','counts'));
    }
	
}
	
