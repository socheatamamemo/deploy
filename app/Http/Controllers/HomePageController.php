<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class HomePageController extends Controller
{
    public function homepage() {
        return view('guest.homepage');
    }

    public function aboutUs() {
        return view('guest.aboutUs');
    }

    public function termPolicy() {
        return view('guest.termPolicy');
    }

    public function getalert() {
        return view('guest.getalert');
    }
}
