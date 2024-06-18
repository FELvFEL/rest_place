<?php

namespace App\Http\Controllers;

use App\Models\{Place,WishList};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $wishlists = $user->wishlists()->with('place')->get();

        return response()->json($wishlists, 200);
    }
    public function indexAll()
    {
        $wishlists = Wishlist::with('place', 'user')->get();
        return response()->json($wishlists);
    }
    public function add($placeId)
    {
        $user = Auth::user();
        $count = $user->wishlists()->count();
        if ($count >= 3) {
            return response()->json(['message' => 'Maximum number of places reached'], 400);
        }
        $place = Place::query()->find($placeId);
        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        if ($user->wishlists()->where('place_id', $placeId)->exists()) {
            return response()->json(['message' => 'Place is already in wishlist'], 400);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $user['id'];
        $wishlist->place_id = $placeId;
        $wishlist->save();

        return response()->json(['message' => 'Place added to wishlist'], 201);
    }
}
