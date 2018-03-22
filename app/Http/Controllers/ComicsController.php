<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    public function add(Request $request)
    {
    
        //store dans le dossier public, le fichier 'miniature'
        $originalName = $request->file('miniature')->getClientOriginalName();
        $pathstart = $request->file('miniature')->storeAs('public', $originalName);
        //enlève le public devant   
        $path = substr($pathstart, 7);  

         

        $titre = $request->input('titre');
        $auteur = $request->input('auteur');
        $editeur = $request->input('editeur');
            
         DB::table('comics')->insert(
           array('com_title' => $titre,
               'com_author' => $auteur,
                'com_publisher' => $editeur,
                'com_miniature_url'=> $originalName)
                   
            );

         echo 'Base de données mise à jour.';

        header('refresh: 3; url = ajouter-bd');
        

        }



        public function fetchUniqueBD($id){
            $comics = DB::table('comics')->where('com_oid', '=', $id)->get();    
            return view('update-bd',['comic' => $comics [0]]);

        }



    public function show(){
    	$comics = DB::table('comics')->get();
        return view('catalogue',['comics' => $comics]);
    }   


    public function update($id, Request $request){
        $titre = $request->input('titre');
        $auteur = $request->input('auteur');
        $editeur = $request->input('editeur');
        $miniature = $request->input('miniature');

        DB::table('comics')->where('com_oid', '=', $id)->update(['com_title' => $titre, 'com_author' => $auteur, 'com_publisher' => $editeur, 'com_miniature_url' => $miniature]);


        echo 'la modif à bien été faite';
        header('refresh: 3; url = '.$id);

    }

    public function delete(Request $request){
        $id = $request->input('delete');
        DB::table('comics')->where('com_oid', '=', $id)->delete(); 
        echo 'cela a bien ete supprimer';
        header('refresh: 3; url = delete-bd');
    }
}


