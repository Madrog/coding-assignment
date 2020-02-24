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

class IndividualApiController extends Controller
{
    public function getTop100Individuals()
    {
        $individuals = Individual::all();
        return response($individuals->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function getIndividual($id)
    {
        if(Individual::where('id', $id)->exists())
        {
            $individual = Individual::where('id', $id)->get();
            return response($individual->toJson(JSON_PRETTY_PRINT), 200);
        }
        else
        {
            return response()->json([
                "message" => "Individual not found"
            ], 404);
        }
    }
}
