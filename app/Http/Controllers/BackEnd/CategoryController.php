<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function __construct(){

    }
    function index(){
        $category = category::all();
        return view("BackEnd.page.category.list-category", compact("category"));
    }

    function create(){
        return view("BackEnd.page.category.add-category");
    }
    function hendln_create(Request $request){
        $category = new category;
        $category->name_categori = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect()->route("category");
    }

    function destroy(Request $request){
       $category = category::where("id_categori", $request->id)->first();
       $category->delete();
       $request->session()->put('message','Xóa category thành công');
       return back();
    }

    function edit(Request $request){
        $category = category::where("id_categori", $request->id)->first();
        $category->status = ($request->status ==1 ? 2 : 1 );
        $category->save();
       return back();
    }
}
