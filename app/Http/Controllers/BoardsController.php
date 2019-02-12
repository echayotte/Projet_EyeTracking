<?php

namespace App\Http\Controllers;

// Modules nécessaires pour gestion des erreurs et du storage
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Board;

/*
|--------------------------------------------------------------------------
| Controller pour les PAGES des BD
|--------------------------------------------------------------------------
*/

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idBD, Request $request)
    {
        $validatedData = $request->validate(['filename' => 'required|image']); // Vérifie que le fichier uploadé est bien une image.
        $numeroPage = $_POST['numeroPage'];

        // try-catch de la requête
       try {
           // récupère le nom du fichier uploadé
            $originalName = $request->file('filename')->getClientOriginalName();
            $completePath = $request->file('filename')->storeAs('public/images/pages', $originalName);
            $path = substr($completePath, 7); // retire la chaîne 'public/' du path

            // envoi du path du fichier, du numéro de la page et de l'id de la bd correspondante dans la table 'pages'

            $board = new Board;

            $board-> board_image = $originalName;
            $board-> board_number = $numeroPage;
            $board-> fk_comic_id = $idBD;
            
            $board->save();



            // DB::table('boards')->insert(
            //     array('board_image' => $originalName,
            //     'board_number' => $numeroPage,
            //     'fk_comic_id' => $idBD)
            // );
                
            $message = "Page {$numeroPage} ajoutée";
        } catch (QueryException $e) { // affiche une erreur si le fichier est en doublon
            $error_code = $e->errorInfo[1];
             if($error_code == 1062){ // 1062 est le code d'erreur pour un duplicate sur col definie en unique
                $message = "La page {$numeroPage} existe déjà";
            }
            if($error_code == 1452){ // 1452 est le code d'erreur généré lorque l'id de la BDn'existe pas
            
                $message = "La BD numéro {$idBD} n'existe pas";
            }
        }
        
        // redirection sur la même page
        return redirect()->back()->with('message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBD, $idPage)
    {
        // Requête BDD pour récupérer le path de l'image stocké dans la table 'pages' (renvoie un tableau)
        // $boards = DB::table('boards')->where([['board_number', '=', $idPage], ['fk_comic_id', '=', $idBD]])->get();

        // envoie le path pour la src de l'image 
        // return view('boards.index', ['pages' => $pages]);
       
        // $board = Board::all()->where('fk_comic_id',$idBD)->where('board_number',$idPage);
        $boards = Board::all()->where('fk_comic_id', $idBD);
        $board = Board::all()->where('fk_comic_id',$idBD)->where('board_number',$idPage)->pluck('board_image');

        return view('boards.show',compact('boards', 'board'));
    }

    /**
     * Show the form for editing the specified resource.
          * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}