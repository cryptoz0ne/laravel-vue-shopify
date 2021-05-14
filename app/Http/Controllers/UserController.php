<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show() {
        $user = Auth::user();

        return Inertia::render('Profile', [
            'user' => $user,
            'shopify' => $user->shopify
        ]);
    }
}
