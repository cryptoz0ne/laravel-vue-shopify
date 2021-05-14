<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index() {
        $user = Auth::user();
        $token = $user->shopify ? $user->shopify->shopify_token : null;
        $products = [];

        if ($token) {
            $productsResponse = Http::withHeaders([
                'X-Shopify-Access-Token' => $user->shopify->shopify_token
            ])->get('https://'.env('SHOPIFY_SUB_DOMAIN').'.myshopify.com/admin/api/2021-04/products.json');

            $products = $productsResponse->json()['products'];
        }

        return Inertia::render('Products/Show', [
            'token' => $token,
            'products' => $products
        ]);
    }
}
