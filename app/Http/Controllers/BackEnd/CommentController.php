<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Models\comments;

class CommentController extends Controller
{
    function __construct(){

    }
    function index(Request $request){
        $user = $request->session()->get('user');
        $comments = DB::table("comments")->join("users", "users.id", "=", "comments.id_user")->where("id_film", $request->id)->orderBy("date","DESC")->limit(3)->get();
        return view("FrontEnd.block.review",["comments"=>$comments,
                                             "user"=>$user,
                                            "id_film" => $request->id]);
    }

    function admin_index(Request $request){
        $film = film::all();
        
        foreach ($film as $key => $value) {
            $comments = DB::table("comments")->join("users", "users.id", "=", "comments.id_user")->where("id_film", $value->id_film)->orderBy("date","DESC")->get();
            $film[$key]["comments"]= $comments;
        //   dd($comments);
        }
        // $perPage = 2; // Số sản phẩm hiển thị trên mỗi trang
        // $film = $film->paginate($perPage);
        // dd($film);
        return view("BackEnd.page.comments.list-comments", compact("film"));
    }
    function create(Request $request){
        $user = $request->session()->get('user');
            DB::table("comments")->insert([
                "content"=>$request->content,
                "id_user"=>$user->id,
                "id_film"=>$request->id_film,
                "rule"=>$request->rule
            ]);
    }

    function destroy(){
        
    }

    function edit(){
        
    }
}
