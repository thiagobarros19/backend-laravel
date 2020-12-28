<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sell;
use App\Models\SellItem;

class SellController extends Controller
{

    public function create(Request $request)
    {
        DB::transaction(function() use ($request) {
            $sell = new Sell([
                'user_id' => $request->user_id,
                'total' => $request->total,
            ]);

            $sell->save();

            foreach($request->items as $item){
                $sellItem = new SellItem([
                    'sell_id' => $sell->id,
                    'product_id' => $item['product_id'],
                    'amount' => $item['amount'],
                    'unit_price' => $item['unit_price'],
                    'total' => $item['total'],
                ]);

                $sellItem->save();
            };
        });

        return response()->json([
            'message' => 'Successfully created sell!'
        ], 201);
    }
}
