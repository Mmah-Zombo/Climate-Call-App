<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function render() {
        $user = Auth::user();
        $userHistory = $user->searches()->orderBy('created_at', 'desc')->get();
        return view('dashboard', ['history' => $userHistory]);
    }
}
