<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\UserExtra;

class ShopifyController extends Controller
{
    /*
     * Generate Shopify Connect Link
     */
    public function connect() {
        $url = 'https://'.env('SHOPIFY_SUB_DOMAIN').'.myshopify.com/admin/oauth/authorize?client_id='.env('SHOPIFY_API_KEY').'&scope=read_products&redirect_uri='.env('APP_URL').'/shopify/redirect&state=nonce&grant_options[]=access_mode';

        return response()->json([
            'url' => $url
        ], 200);
    }

    /*
     * Confirm Shopify Connection from the redirected Link
     */
    public function confirm(Request $request) {
        $data = $request->all();

        // Check Validation - State, Shop, HMAC
        if($data['state'] == 'nonce' && preg_match('/\A[a-zA-Z0-9][a-zA-Z0-9\-]*\.myshopify\.com\z/', $data['shop'])) {
            // Passed
            $connectResponse = Http::post('https://'.env('SHOPIFY_SUB_DOMAIN').'.myshopify.com/admin/oauth/access_token', [
                'client_id' => env('SHOPIFY_API_KEY'),
                'client_secret' => env('SHOPIFY_SECRET_KEY'),
                'code' => $data['code']
            ]);

            $connectData = $connectResponse->json();

            $user = Auth::user();
            $userExtra = new UserExtra;
            $userExtra->user_id = $user->id;
            $userExtra->shopify_token = $connectData['access_token'];
            $userExtra->save();

            return redirect('/products');
        }

        // Not Passed
        return redirect('/profile');
    }

    /*
     * Remove shopify token
     */
    public function disconnect() {
        $user = Auth::user();
        $userExtra = $user->shopify;
        $userExtra->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
