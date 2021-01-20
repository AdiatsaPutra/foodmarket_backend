<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        // Mengambil ID
        if ($id) {
            $food = Food::find($id);
            return ResponseFormatter::success(
                $food,
                'Data Produk Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Produk Tidak Ada',
                404
            );
        }

        // Mengambil Selain Id
        $food = Food::query();

        if ($name) {
            $food->where('name', 'like', '%' . $name . '%');
        }
        if ($types) {
            $food->where('types', 'like', '%' . $types . '%');
        }
        if ($price_from) {
            $food->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $food->where('price', '<=', $price_from);
        }
        if ($rate_from) {
            $food->where('rate', '>=', $rate_from);
        }
        if ($rate_to) {
            $food->where('rate', '<=', $rate_from);
        }
        return ResponseFormatter::success(
            $food->paginate($limit),
            'Data List Produk Berhasil Diambil'
        );
    }
}
