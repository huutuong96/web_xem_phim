<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\Category;
use Illuminate\Support\Facades\File;

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
    function hendln_create(Request $request){
        $roles = [
            "film_name" => "required",
            "img" => "required",
            "film_desc" => "required",
            "link" => "required",
            "film_genre" => "required",
            "author" => "required",
        ];
        $messenges = [// đổ ra messenge
            "film_name.required" => "Chưa nhập tên film",
            "img.required" => "Chưa chọn ảnh",
            "film_desc.required" => "Chưa nhập mô tả cho film",
            "link.required" => "Chưa nhập đường link cho film",
            "film_genre.required" => "Chưa nhập thể loại cho film",
            "author.required" => "Chưa nhập tên tác giả",
        ];
        $validator = $request->validate($roles, $messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $film = new film;
        $film->film_name = $request->film_name;
        $film->film_image = $request->img->getClientOriginalName();
        $film->film_desc = $request->film_desc;
        $film->link = $request->link;
        $film->film_genre = $request->film_genre;
        // $film->epsode = $request->film_name;
        $film->view = 0;
        $film->star = 5;
        $film->id_categori = $request->id_categori;
        $film->author = $request->author;
        $film->other_information = $request->other_information;
        $film->type = $request->status;
        // dd($film->film_image);
        $request->img->move("public/FrontEnd/img/film",$film->film_image);
        $film->save();
        $request->session()->put("message","Thêm film thành công");
        return redirect()->route("film");
    }

    function destroy(Request $request){
        $film = film::Where("id_film", $request->id)->first();
        $link= "public/FrontEnd/img/film".$film->film_image;
        file::delete($link);
        $request->session()->put("message","Xóa film thành công");
        $film->delete();
        return back();
    }

    function edit(Request $request){

        $film = film::select("films.*","categories.name_categori")->where("id_film", $request->id)->join("categories","films.id_categori","=","categories.id_categori")->first();
        // dd($film);
        $category = category::all();
        return view("BackEnd.page.film.edit-film", compact("film","category"));
    }
    function hendln_edit(Request $request){
        
        $roles = [
            "film_name" => "required",
            "film_desc" => "required",
            "link" => "required",
            "film_genre" => "required",
            "author" => "required",
        ];
        $messenges = [// đổ ra messenge
            "film_name.required" => "Chưa nhập tên film",
            "film_desc.required" => "Chưa nhập mô tả cho film",
            "link.required" => "Chưa nhập đường link cho film",
            "film_genre.required" => "Chưa nhập thể loại cho film",
            "author.required" => "Chưa nhập tên tác giả",
        ];
        $validator = $request->validate($roles, $messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $film = film::where("id_film", $request->id)->first();

        if($request->img){
            $link = public_path("public/FrontEnd/img/film".$request->image);
            file::delete($link);
            $film->film_image = $request->img->getClientOriginalName();
            $request->img->move("public/FrontEnd/img/film",$film->film_image);
         
        }else{
            // dd("$request->image");
            $film->film_image = $request->image;
        }

        // dd($film->film_image);
        $film->film_name = $request->film_name;
        $film->film_desc = $request->film_desc;
        $film->link = $request->link;
        $film->film_genre = $request->film_genre;
        $film->id_categori = $request->id_categori;
        $film->author = $request->author;
        $film->other_information = $request->other_information;
        $film->type = $request->status;
        $film->view = $request->view;
        $film->star = $request->star;
        $film->save();
        $request->session()->put("message","Sửa thông tin của film thành công");
        return redirect()->route("film");
    }
    function search(Request $request){
        return redirect()->route("categori")->with(["search" => $request->name]) ;
    }
    
}
