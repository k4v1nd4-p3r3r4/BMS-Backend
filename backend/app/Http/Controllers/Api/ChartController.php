<?php

namespace App\Http\Controllers\Api;

use App\Models\Manufood;
use App\Models\Manuitems;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
 


    public function getTotalFoodQtyByDate()
    {
        // Query to get the total quantity of food items grouped by date
        $totalFoodQtyByDate = Manufood::select('date', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Return the response
        return response()->json([
            'status' => 200,
            'data' => $totalFoodQtyByDate,
        ], 200);
    }

    public function getTotalItemQtyByDate()
    {
        // Query to get the total quantity of items grouped by date
        $totalItemQtyByDate = Manuitems::select('date', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Return the response
        return response()->json([
            'status' => 200,
            'data' => $totalItemQtyByDate,
        ], 200);
    }

    public function getAvailableQuantities()
    {
        // Fetch material_id, material_name, and available_qty from the database
        $materials = Materials::select('material_id', 'material_name', 'available_qty')->get();

        // Prepare data in the desired format
        $data = [];
        foreach ($materials as $material) {
            $data[$material->material_id] = $material->available_qty;
        }

        return response()->json($data);
    }
}