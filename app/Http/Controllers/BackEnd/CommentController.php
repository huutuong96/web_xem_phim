<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    function create(Request $request){
        if(!auth::check()){
            return redirect()->route("login")->with("msg","Bạn phải đăng nhập trước khi bình luận");
        }else{
            $user = $request->session()->get('user');
            DB::table("comments")->insert([
                "content"=>$request->content,
                "id_user"=>$user->id,
                "id_film"=>$request->id_film,
                "rule"=>$request->rule
            ]);
        } 
    }

    function destroy(){
        
    }

    function edit(){
        
    }
}
