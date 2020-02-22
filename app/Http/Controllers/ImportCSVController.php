<?php

namespace App\Http\Controllers;

use App\Transaction;
use DB;
use Excel;
use Illuminate\Http\Request;

class ImportCSVController extends Controller
{
    public function import()
    {
        return view('import_excel');
    }

    public function export()
    {
        return view('export_excel');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required'
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach($data as $key => $value) {
                $arr[] = [
                    'individual_Id' => $value->individual_id, 
                    'amount' => $value->amount,
                    'type' => $value->type
                ];
            }

            if(!empty($arr)) {
                Transaction::insert($arr);
            }
        }
        return back()->with('success', 'Insert Record successfully');
    }
}
