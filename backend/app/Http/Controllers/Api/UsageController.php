<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Usagematerials;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsageController extends Controller
{
   

    public function usageMaterials(){
        
        $usage = Usagematerials::all();
        if ($usage->count() > 0) {
            return response()->json([
                'status' => 200,
                'usage' => $usage
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No records found'
            ], 404);
        }
    }
    public function usageStore(Request $request){
        $validator = Validator::make($request->all(), [
            
            'material_id' => 'required',
            'date' => 'required',
            'usage_qty' => 'required|numeric'
            
        ], [
            
            'usage_qty.numeric' => 'Usage quantity must be a number'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        } else {
            // Create a new instance of Usagematerials model
           $usage =Usagematerials::create([
            'material_id'=> $request->material_id,
            'date'=> $request->date,
            'usage_qty'=> $request->usage_qty
           
           ]);
    
            if ($usage) {



                $materialsController = new MaterialsController();
                $materialsController->updateInitialQuantity($request->material_id, -$request->usage_qty);



                return response()->json([
                    'status' => 200,
                    'message' => 'Usage quantity added successfully',
                    'material' => $usage
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed! Something went wrong!'
                ], 500);
            }

            
        }
    }

    public function usageShow($usage_id){
        $usage = Usagematerials::find($usage_id);
        if ($usage) {
            return response()->json([
                'status' => 200,
                'usage' => $usage
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
               'message' => 'No records found'
            ], 404);
        }
    }

    public function usageedit($usage_id){

        $usage = Usagematerials::find($usage_id);
        if ($usage) {
            return response()->json([
                'status' => 200,
                'usage' => $usage
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
               'message' => 'No records found'
            ], 404);
        }
    }
    public function usageupdate(Request $request, int $usage_id) {
        

            $validator = Validator::make($request->all(), [
            
                'material_id' => 'required',
                'date' => 'required',
                'usage_qty' => 'required|numeric'
                
            ], [
                
                'usage_qty.numeric' => 'Usage quantity must be a number'
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'message' => $validator->messages()
                ], 422);
            } else {
               
                $usage =Usagematerials::find($usage_id);
              
        
                if ($usage) {

                    $usage->update([
                        'material_id'=> $request->material_id,
                        'date'=> $request->date,
                        'usage_qty'=> $request->usage_qty,
                       
                       ]);
                    return response()->json([
                        'status' => 200,
                        'message' => 'Usage updated successfully',
                        'usage' => $usage
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Failed! Something went wrong!'
                    ], 404);
                }
    
                
            }
        }
        public function usagedestroy($usage_id){

            $usage = Usagematerials::find($usage_id);

            if($usage){

                $usage->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Deleted successfully',
                    
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Failed! Something went wrong!'
                ], 404);
            }
        }
    
        }
    
    

