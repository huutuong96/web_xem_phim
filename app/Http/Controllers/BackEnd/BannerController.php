<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    function __construct(){

    }
    function index(){
        $banners = Banner::all();
        // dd($banners);
        return view("BackEnd.page.banner.list-banner", compact('banners'));
    }

    function create(Request $request){
        $rules=[
            "image" => 'required',
            "title" => 'required',
            "content" => 'required'
        ];
        $validator = $request->validate($rules);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $banner = new banner;
        $banner->title = $request->title;
        $banner->content = $request->content;
        $banner->image = $request->image->getClientOriginalName();
        $banner->other_information = $request->other_information ?? null;
        
        //xử lý hình ảnh
        $request->image->move("public/FrontEnd/img/banner",$banner->image);
        $banner->save();
        $request->session()->put('message','Thêm mới banner thành công');
        return back();
    }

    function delete(Request $request){
        $banner = banner::where("id_banner", $request->id)->first();  
        // dd($banner->image)     ;
        $link = public_path("FrontEnd/img/banner/".$banner->image);
        file::delete($link);
        $banner->delete();
        $request->session()->put('message','Xóa banner thành công');
        return redirect()->back();
    }

    function edit(){
        
    }
}
