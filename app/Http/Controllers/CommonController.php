<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CommonController extends Controller
{

    public function dashboard(Request $request){

        $successData = DB::table("order")
        ->select('order.*','product.name as pname','users.name as uname','product.price')
        ->leftJoin("product","product.id","=","order.product_id")
        ->leftJoin("users","users.id","=","order.user_id")
        ->get();
        
        return view("dashboard")->with('successData',$successData);
    }
    public function login(Request $request){
        return view("login");
    }
    public function checkLogin(Request $request){

        $adminInfo = array("email" => $request->email, "password" => $request->password);
        if(auth()->attempt($adminInfo)) {
            $admin = auth()->user();
            $administrators = DB::table('users')->where('id', $admin->myid)->get();
            //print_r($admin->id);die();
            session(['administrators' => $administrators]);
            return redirect()->intended('/dashboard')->with('administrators', $administrators);
        } else {
            return redirect('/')->with('loginError','Email or Password is incorrect');
        }
        
    }


}
