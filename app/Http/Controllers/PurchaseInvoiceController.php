<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseInvoice;
// use App\Models\Type;
// use App\Models\Brand;

class PurchaseInvoiceController extends Controller
{
    public function __construct(PurchaseInvoice $purchaseinvoice)
    {
        $this->middleware('jwt', ['except' => ['']]);
        $this->purchaseinvoice = $purchaseinvoice;
    }

    public function getInvoice()
    {
        try {
            $data = PurchaseInvoice::orderBy('updated_at', 'desc')->get();
            $array = Array();
            $array['data'] = $data;
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }
    
    public function getInvoiceNo($salesNo)
    {
        try {
            $data = PurchaseInvoice::where('salesNo', $salesNo)->orderBy('itemName', 'asc')->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }

    public function getInvoicePrice($salesNo)
    {
        try {
            $data = PurchaseInvoice::where('salesNo', $salesNo)->get();
            return $data->sum(function ($detail) {
                return $detail->price * $detail->quantity;
            });
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }

    public function addInvoice(Request $request)
    {
        $request->validate([
            // 'type_id'=> 'required',
            // 'brand_id'=> 'required',
            'salesNo'=> 'required',
            'itemName'=> 'required',
            'quantity'=> 'required',
            'price'=> 'required',
        ]);

        $new =
        [
            // 'type_id'=> $request->type_id,
            // 'brand_id'=> $request->brand_id,
            'salesNo'=> $request->salesNo,
            'itemName'=> $request->itemName,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ];
        
        try
        {
            $data = $this->purchaseinvoice->create($new);
            $array = Array();
            $array['data'] = $data;
            return response()->json($array);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateInvoice($id, Request $request)
    {
        $new =
        [
            // 'type_id'=> $request->type_id,
            // 'brand_id'=> $request->brand_id,
            'salesNo'=> $request->salesNo,
            'itemName'=> $request->itemName,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ];
        
        // if (! $request->has("type_id") {
            // $new = $request->except(["type_id"])
        // });
        // if (! $request->has("brand_id") {
            // $new = $request->except(["brand_id"])
        // });
        if (! $request->has("salesNo") {
            $new = $request->except(["salesNo"])
        });
        if (! $request->has("itemName") {
            $new = $request->except(["itemName"])
        });
        if (! $request->has("quantity") {
            $new = $request->except(["quantity"])
        });
        if (! $request->has("price") {
            $new = $request->except(["price"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            PurchaseInvoice::where('id',$id)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteInvoice($id)
    {
        try{
            $data = PurchaseInvoice::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
    
    public function deleteInvoiceNo($salesNo)
    {
        try{
            $data = PurchaseInvoice::where("salesNo",$salesNo)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}
