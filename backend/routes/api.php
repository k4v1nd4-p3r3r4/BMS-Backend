<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsageController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\MaterialsController;
use App\Http\Controllers\Api\PurchaseMaterialController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//This Routes for the Material
Route::get('materials',[MaterialsController::class,'index']);
Route::post('materials',[MaterialsController::class, 'store']);
Route::get('materials/{material_id}',[MaterialsController::class,'show']);
Route::get('materials/{material_id}/edit',[MaterialsController::class,'edit']);
Route::put('materials/{material_id}/edit',[MaterialsController::class,'update']);
Route::delete('materials/{material_id}/delete',[MaterialsController::class,'destroy']);

//This Routes for the UsageMaterial
Route::get('usagematerials',[UsageController::class,'usageMaterials']);
Route::post('usagematerials',[UsageController::class, 'usageStore']);
Route::get('usagematerials/{usage_id}',[UsageController::class,'usageShow']);
Route::get('usagematerials/{usage_id}/usageedit',[UsageController::class,'usageedit']);
Route::put('usagematerials/{usage_id}/usageedit',[UsageController::class,'usageupdate']);
Route::delete('usagematerials/{usage_id}/usagedelete',[UsageController::class,'usagedestroy']);

//This Routes for the purchaseMaterial
Route::get('purchaseMaterial',[PurchaseMaterialController::class,'purchase']);
Route::post('purchaseMaterial',[PurchaseMaterialController::class, 'purchaseStore']);
Route::get('purchaseMaterial/{purchase_id}',[PurchaseMaterialController::class,'purchaseShow']);
Route::get('purchaseMaterial/{purchase_id}/purchaseedit',[PurchaseMaterialController::class,'purchaseedit']);
Route::put('purchaseMaterial/{purchase_id}/purchaseedit',[PurchaseMaterialController::class,'purchaseupdate']);
Route::delete('purchaseMaterial/{purchase_id}/purchasedelete',[PurchaseMaterialController::class,'purchasedestroy']);

//This Routes for the suppliers
Route::get('suppliers',[SupplierController::class,'supplier']);
Route::post('suppliers',[SupplierController::class, 'supplierStore']);
Route::get('suppliers/{supplier_id}',[SupplierController::class,'supplierShow']);
Route::get('suppliers/{supplier_id}/supplieredit',[SupplierController::class,'supplieredit']);
Route::put('suppliers/{supplier_id}/supplieredit',[SupplierController::class,'supplierupdate']);
Route::delete('suppliers/{supplier_id}/supplierdelete',[SupplierController::class,'supplierdestroy']);