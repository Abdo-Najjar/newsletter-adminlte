<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->role == User::ADMIN_ROLE) {

            return view('dashboard.admin.home');
        } else {
      
            $newsletters = Newsletter::paginate(10);

            return view('dashboard.client.home', compact('newsletters'));
        }
    }


    public function logout()
    {

        auth()->logout();

        return redirect()->back();
    }
}
