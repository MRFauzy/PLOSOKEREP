<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{   

    public function dashboard(){
         return view('backend.dashboard');
     }

    public function homepage(){
        return view('homepage');
    }

    public function user(Request $request){
        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('backend.user',compact('data','request'));
    }

    public function create(){ 
        return view ('create');
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'required',
       ]);

       if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

       $data['email']       = $request->email;
       $data['name']        = $request->nama;
       $data['password']    = Hash::make($request->password);

       User::create($data);

       return redirect()->route('index');
    }
}
