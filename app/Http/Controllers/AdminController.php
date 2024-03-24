<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public object $user;

    public function __construct()
    {
        $this-> user = (object) [
            'email' => 'gpress@admin.panel',
            'password' => '$2y$10$PlR/Juu2rW/s8yfMMNs29OcEpn6zL2HxcCSCBrSTKiVS07FeotMZO' //$AdminPanel2024#
        ];
    }
    public function login()
    {
        if(Session::has('admin')) return redirect() -> route('admin.dashboard.page');
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        if($this -> user -> email == $request -> email){
            if(password_verify($request -> password, $this -> user -> password)){
                Session::put('admin', $this -> user);
                return redirect() -> route('admin.dashboard.page', ['language' => app() -> getLocale()]);
            }  else return redirect() -> back() -> with('password', 'პაროლი არასწორია');
        } else return redirect() -> back() -> with('email', 'ელ.ფოსტა არასწორია');

    }

    public function logout()
    {
        Session::forget('admin');
        return redirect() -> route('admin.login.page', ['language' => app() -> getLocale()]);
    }



    public function  dashboard()
    {
        return view('admin.desk', [
            'articles' => (object) [
                'title' => 'სტატიები',
                'count' => Article::count()
            ]
        ]);
    }
}
