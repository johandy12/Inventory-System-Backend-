<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchases;

class PurchasesController extends Controller
{
    public function __construct(Purchases $purchases)
    {
        $this->middleware('jwt', ['except' => ['']]);
        $this->purchases = $purchases;
    }

    public function getPurchases()
    {
        try {
            $data = Purchases::orderBy('updated_at', 'desc')->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'file is empty'], 404);
    }
    
    public function getSalesNo($salesNo)
    {
        try {
            $data = Purchases::where('salesNo', $salesNo)->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'no data is found'], 404);
    }

    public function getMonthlyPurchasesTotal($month)
    {
        try {
            //$data = Stocks::select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'))->groupby('year', 'month');
            $data = Purchases::whereMonth('transactionDate', '=', $month)->get();
            $array = Array();
            $array['data'] = $data;
            return $data->sum('totalPrice');
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'no data is found'], 404);
    }

    public function addPurchases(Request $request)
    {
        $purchases = new Purchases();

        //Validation
        $request->validate([
            'salesNo'=> 'required',
            'sellerName'=> 'required',
            'paymentType'=> 'required',
            'totalPrice'=> 'required',
            'transactionDate'=> 'required',
            'status'=> 'required',
        ]);

        //Input
        $purchases->salesNo = $request->input('salesNo');
        $purchases->sellerName = $request->input('sellerName');
        $purchases->paymentType = $request->input('paymentType');
        $purchases->totalPrice = $request->input('totalPrice');
        $purchases->tax = $request->input('tax');
        $purchases->shipment = $request->input('shipment');
        $purchases->description = $request->input('description');
        $purchases->transactionDate = $request->input('transactionDate');
        $purchases->status = $request->input('status');

        if ($purchases->tax == null) {
            $purchases->tax = '0';
        };
        if ($purchases->shipment == null) {
            $purchases->shipment = '0';
        };
        if ($purchases->description == null) {
            $purchases->description = '';
        };

        try
        {
            $purchases->save();
            return ($purchases);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updatePurchases($salesNo, Request $request)
    {
        $new =
        [
            'salesNo'=> $request->salesNo,
            'sellerName'=> $request->sellerName,
            'paymentType'=> $request->paymentType,
            'totalPrice'=> $request->totalPrice,
            'tax'=> $request->tax,
            'shipment'=> $request->shipment,
            'description'=> $request->description,
            'transactionDate'=> $request->transactionDate,
            'status'=> $request->status,
        ];

        if (! $request->has("salesNo") {
            $new = $request->except(["salesNo"])
        });
        if (! $request->has("sellerName") {
            $new = $request->except(["sellerName"])
        });
        if (! $request->has("paymentType") {
            $new = $request->except(["paymentType"])
        });
        if (! $request->has("totalPrice") {
            $new = $request->except(["totalPrice"])
        });
        if (! $request->has("tax") {
            $new = $request->except(["tax"])
        });
        if (! $request->has("shipment") {
            $new = $request->except(["shipment"])
        });
        if (! $request->has("description") {
            $new = $request->except(["description"])
        });
        if (! $request->has("transactionDate") {
            $new = $request->except(["transactionDate"])
        });
        if (! $request->has("status") {
            $new = $request->except(["status"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            Purchases::where('salesNo', $salesNo)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "no data is found"], 404);
        }
    }

    public function deletePurchases($salesNo)
    {
        try{
            $data = Purchases::where("salesNo", $salesNo)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "no data is found"], 404);
        }
    }
}
