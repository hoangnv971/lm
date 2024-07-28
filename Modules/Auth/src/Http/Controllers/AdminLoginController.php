<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        dd(app());
        return view('auth::login');
    }

    public function postLogin(){

    }
}
