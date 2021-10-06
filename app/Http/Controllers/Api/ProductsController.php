<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('photos');

        $pageSize = $request->get('page-size');
        $page = $request->get('page');
        $take = $pageSize > 0 ? $pageSize : 10;
        $page = $page > 1 ? ($page - 1) * $take : 0;

        if ($request->filled('category_id')) {
            $products->where('category_id',$request->get('category_id'));
        }

        return $products->skip($page)->take($take)->get();
    }

    public function trending()
    {
        $trendingProducts = Product::with('photos')->where('label', 'trending')->get();
        if (! $trendingProducts) {
            return response()->json('No trending products', 200);
        }

        return response()->json($trendingProducts, 200);
    }

    public function hot()
    {
        $hotProducts = Product::with('photos')->where('label', 'hot')->get();
        if (! $hotProducts) {
            return response()->json('No hot products', 200);
        }

        return response()->json($hotProducts, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Api $api)
    {
        //
    }

    public function edit(Api $api)
    {
        //
    }

    public function update(Request $request, Api $api)
    {
        //
    }

    public function destroy(Api $api)
    {
        //
    }
}