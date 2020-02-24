<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\IndividualResource;
use App\Http\Resources\IndividualsCollection;
use App\Http\Resources\SaccosResource;
use App\Http\Resources\SaccosCollection;
use App\Http\Resources\TransactionsResource;
use App\Http\Resources\TransactionsCollection;
use App\Individual;
use App\Sacco;
use App\Transaction;

class SaccosApiController extends Controller
{
    public function getAllSACCOs()
    {
        $saccos = Sacco::all();
        return response($saccos->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function getSACCO($id)
    {
        if(Sacco::where('id', $id)->exists())
        {
            $sacco = Sacco::where('id', $id)->get();
            return response($sacco->toJson(JSON_PRETTY_PRINT), 200);
        }
        else
        {
            return response()->json([
                "message" => "SACCO not found"
            ], 404);
        }
    }
}
