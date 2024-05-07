<?php

namespace App\Http\Controllers\Api;

use App\Models\Materials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NotifiController extends Controller
{
    public function checkLowQuantityMaterials()
    {
        // Query materials with available_qty below 20
        $lowQuantityMaterials = Materials::where('available_qty', '<', 20)->get();
    
        $notifications = [];
    
        foreach ($lowQuantityMaterials as $material) {
            $notification = [
                'material_id' => $material->material_id, // Include material ID
                'material_name' => $material->material_name,
                'message' => 'Quantity is low for material ID ' . $material->material_id . ': ' . $material->material_name,
                'timestamp' => now(), // You can format timestamp as needed
            ];
    
            $notifications[] = $notification;
        }
    
        return response()->json([
            'status' => 200,
            'notifications' => $notifications,
        ], 200);
    }
    

    public function deleteNotification($material_id)
    {
        // Find the notification by material_id and delete it
        $notification = Materials::where('material_id', $material_id)->delete();

        if ($notification) {
            return response()->json([
                'status' => 200,
                'message' => 'Notification deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Notification not found',
            ], 404);
        }
    }
}
