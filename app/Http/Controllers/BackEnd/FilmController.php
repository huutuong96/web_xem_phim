<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\Category;

class FilmController extends Controller
{
    function __construct(){

    }
    function index(){
        $perPage = 4; // Số sản phẩm hiển thị trên mỗi trang
        $film = film::paginate($perPage);
        return view("BackEnd.page.film.list-film", compact("film"));
    }

    function create(){
        $category = category::all();
        return view("BackEnd.page.film.add-film", compact("category"));
    }
    function hendln_create(){
        
    }

    function destroy(){
        
    }

    function edit(){
        
    }
    function search(Request $request){
     
        return redirect()->route("categori")->with(["search" => $request->name]) ;
    }
    
}
