<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    function __construct(){

    }
    function index(Request $request){
        $perPage = 4; // Số sản phẩm hiển thị trên mỗi trang
        $users = user::paginate($perPage);
        return view("BackEnd.page.user.list-user", compact("users"));
    }

    function create(){
        return view("BackEnd.page.user.add-user");
    }
    function hendln_create(Request $request){
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
         
            return redirect()->route("users");
        }
    }

    function destroy(Request $request){
        $user= user::where("id", $request->id)->first();
        $link = public_path("public/FrontEnd/img/user".$user->image);
        file::delete($link);
    }

    function rule_edit(Request $request){
        $user = user::where("id", $request->id)->first();
        $user->rule = ($user->rule == 1 ? 0 : 1);
        $user->save();
        return back();
    }
}
