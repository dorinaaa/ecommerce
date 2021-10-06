<?php

namespace App\Http\Controllers\Api;

use App\Favorite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index(Request $request)
    {
		return Favorite::with('product')->where('user_id', $request->get('user_id'))->get();
    }

    public function store(Request $request)
    {
        try {
            $foundProduct = DB::table('favorites')
															->where('product_id', $request->get('product_id'))
															->where('user_id', $request->get('user_id'))
															->first();
            if ($foundProduct) {
                throw new \Exception('Product is already favorite!');
            }
            $favorite = Favorite::create($request->all());
        } catch (\Exception $exception) {
            \Log::error('Could not add to favorites', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }

        return response()->json('Favorite product added successfully!', 200);
    }

    public function show(Favorite $favoriteId)
    {
        $favorite = Favorite::find($favoriteId);

        if (! $favorite) {
            return response()->json('Not found', 404);
        }

        return response()->json($favorite, 200);
    }

    public function update(Request $request, $favoriteId)
    {
        $favorite = Favorite::find($favoriteId);

        if (! $favorite) {
            return resource()->json('Favorite product not found', 404);
        }

        try {
            $favorite->update($request->all());
        } catch (\Exception $exception) {
            \Log::error('Could not update favorite product', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }

        return response()->json('Favorite product was updated!', 200);
    }

    public function delete($favoriteId)
    {
        $favorite = Favorite::find($favoriteId);

        if (! $favorite) {
            return response()->json('Favorite product not found', 404);
        }
        try {
            Favorite::destroy($favoriteId);

            return response()->json('SUCCESS', 200);
        } catch (\Exception $exception) {
            \Log::error('Could not delete favorite product!', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }
    }
}