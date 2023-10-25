<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    function __construct(){

    }
    function index(){
         return view("BackEnd.index");
    }
    

    function create(){
        
    }

    function destroy(){
        
    }

    function edit(){
        
    }
}
