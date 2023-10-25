<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{
    protected $banners; 
    protected $categoris; 
    protected $arr_new;
    protected $arr_top;

    function __construct() {
        $this->banners = DB::table("banner")->get();
        $this->categoris = DB::table("categori")->get();
        $this->arr_new = DB::table("film")->orderBy('id_film', 'desc')->limit(4)->get();
        $this->arr_top = DB::table("film")->orderBy('id_film', 'asc')->limit(5)->get();
    }

    function index(){
        $arr_film = [];
        foreach ($this->categoris as $item) {
            $title = ["id_categori" => $item->id_categori, "name_categori" => $item->name_categori];
            $list_film = DB::table('film')->where("id_categori", $item->id_categori)->limit(6)->get();
            if(isset($list_film[0])){
                $arr_film[] = [$title, $list_film];    
            }
        }
         return view("FrontEnd.index",["banners" => $this->banners,
                                       "categoris"=>$this->categoris,
                                       "arr" => $arr_film,
                                       "new" => $this->arr_new,
                                       "top_view"=>$this->arr_top]); 
    }
    
    // show film by categori
    function show_categori(Request $request){
        $arr = [];
        $categori = DB::table("categori")->where("id_categori", $request->id)->get();
        $title = ["id_categori" => $categori[0]->id_categori, "name_categori" => $categori[0]->name_categori];
        $list_film = DB::table("film")->where("id_categori", $request->id)->limit(18)->get();
        $arr []= [$title, $list_film];
        return view("FrontEnd.page.categori",["arr" => $arr,
                                              "new" => $this->arr_new,
                                              "categoris" => $this->categoris,
                                              "top_view" => $this->arr_top ]);
    }

    // film
    function show_anime_detail(Request $request){
        $film = DB::table("film")->where("id_film", $request->id)->get();
        $comments = DB::table("comments")->join("users", "users.id", "=", "comments.id_user")->where("id_film", $request->id)->get();
        // dd(\Carbon\Carbon::parse($comments[0]->date)->format('H:i:s') );
        if(auth::check()){
            $user = $request->session()->get('user');
            return view("FrontEnd.page.anime-detail",["categoris" => $this->categoris,
                                                  "top_view"=>$this->arr_top,
                                                  "comments"=>$comments,
                                                  "user"=>$user,
                                                  "film" => $film[0]]);
        }else{
            return view("FrontEnd.page.anime-detail",["categoris" => $this->categoris,
                                                  "top_view"=>$this->arr_top,
                                                  "comments"=>$comments,
                                                  "film" => $film[0]]);
        }      
    }

    function show_anime_watch(Request $request){
        $film = DB::table("film")->where("id_film", $request->id)->get();
        $comments = DB::table("comments")->join("users", "users.id", "=", "comments.id_user")->where("id_film", $request->id)->get();
        $categori = DB::table("categori")->where("id_categori", $film[0]->id_categori)->value("name_categori");
        return view("FrontEnd.page.anime-watching",["categoris" => $this->categoris,
                                                    "categori" =>  $categori,
                                                    "comments"=>$comments,
                                                    "film"=> $film[0]]);
                                                    
    }

    //blog

    function show_blog(){
        return view("FrontEnd.page.blog", ["categoris" => $this->categoris]);
    }

    function show_blog_detail(){
        return view("FrontEnd.page.blog-detail", ["categoris" => $this->categoris]);
    }

    // login
    function login(Request $request){
        if(auth::check()){
            $user = $request->session()->get("user");
            return view("FrontEnd.page.user-manager")->with(["user"=> $user,
                                                             "categoris" => $this->categoris]);
        };
        return view("FrontEnd.page.login", ["categoris" => $this->categoris]);
    }
    function hendln_login(Request $request){
        $rules=[
            "email" => 'required| email',
            "password"=>'required'
        ];
        $messenges=[
            "email.required" => 'Bạn chưa nhập Email của mình',
            "email.email" => 'Bạn chưa đăng nhập Email đúng quy chuẩn',
            "password.required" => 'Bạn chưa nhập mật khẩu của '
            
        ];
        $validator = $request->validate($rules,$messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        
        
            $plainPassword = $request->password;
            $user = user::where("email", $request->email)->first();
            if(isset($user)){                                                                                    
                if( hash::check($plainPassword, $user->password)){
                    $request->session()->put('user',$user);
                    auth::login($user);
                    
                    return redirect()->route("home")->with("msg","Đăng nhập thành công");
                    
                }else{
                    return back()->withErrors(["error"=> "Mật khẩu chưa chính xác"])->withInput();
                  
                }
                
            }else{
                return back()->withErrors(["error"=> "Email của bạn chưa được đăng ký"])->withInput();
            }
        }
    
        function logout(Request $request){
            $request->session()->forget('user');
            auth::logout();
            return view("FrontEnd.page.login", ["categoris" => $this->categoris]);
        }
    

    // register
    function register(){
        return view("FrontEnd.page.register", ["categoris" => $this->categoris]);
    }
    function hendln_register(Request $request){
        $rules=[
            "email" => 'required| email| unique:users| max:100',
            "name" => 'required| string| max:20',
            "password" => 'required| string| min:3| max:10| confirmed',
            "password_confirmation"=> 'required|min:3|max:20|'
        ];
        $messenges=[
            "email.required" => 'Bạn chưa nhập Email của mình',
            "email.unique:users" => 'Email của bạn đã tồn tại',
            "email.max:100" => 'Email của bạn dài quá 100 ký tự',
            "name.required" => 'Bạn chưa nhập tên của mình',
            "name.max:20" => 'Tên của bạn dài hơn 20 ký ',
            "password.required" => 'Bạn chưa nhập mật khẩu của ',
            "password.min:3" => 'Mật khẩu phải lớn hơn 3 ký tự',
            "password.max:10" => 'Mật khẩu phải nhỏ hơn 10 ký tự',
            "password_confirmation"=> 'Mật khẩu nhập lại không đúng'
        ];
        $validator = $request->validate($rules,$messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }else{
            $request->merge(['password' => Hash::make($request->password)]); // mã hóa mật khẩu 
        
            try {
                user::create($request->all());
            } catch (\Throwable $th) {
                dd($th);
            }
         
            return redirect()->route("home");
        }
    }

    // contact
    function show_contact(){
        return view("FrontEnd.page.contact");
    }

    
}
