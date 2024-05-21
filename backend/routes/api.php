<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CardsController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\UsageController;
use App\Http\Controllers\Api\NotifiController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\FoodlistController;
use App\Http\Controllers\Api\FoodsaleController;
use App\Http\Controllers\Api\HandlistController;
use App\Http\Controllers\Api\ItemsaleController;
use App\Http\Controllers\Api\ManufoodController;
use App\Http\Controllers\Api\ManuitemController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\DashboardController;
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

//This Routes for the Customers Controller
Route::get('customers',[CustomerController::class,'customer']);
Route::post('customers',[CustomerController::class, 'customerStore']);
Route::get('customers/{customer_id}',[CustomerController::class,'customerShow']);
Route::get('customers/{customer_id}/customeredit',[CustomerController::class,'customeredit']);
Route::put('customers/{customer_id}/customeredit',[CustomerController::class,'customerupdate']);
Route::delete('customers/{customer_id}/customerdelete',[CustomerController::class,'customerdestroy']);

//This Routes for the food products
Route::get('foodlist',[FoodlistController::class,'fooditems']);
Route::post('foodlist',[FoodlistController::class, 'foodStore']);
Route::get('foodlist/{food_id}',[FoodlistController::class,'foodShow']);
Route::get('foodlist/{food_id}/foodedit',[FoodlistController::class,'foodedit']);
Route::put('foodlist/{food_id}/foodedit',[FoodlistController::class,'foodupdate']);
Route::delete('foodlist/{food_id}/fooddelete',[FoodlistController::class,'fooddestroy']);

//This Routes for the handcrafted items
Route::get('handlist',[HandlistController::class,'handitems']);
Route::post('handlist',[HandlistController::class, 'handStore']);
Route::get('handlist/{hand_id}',[HandlistController::class,'handShow']);
Route::get('handlist/{hand_id}/handedit',[HandlistController::class,'handedit']);
Route::put('handlist/{hand_id}/handedit',[HandlistController::class,'handupdate']);
Route::delete('handlist/{hand_id}/handdelete',[HandlistController::class,'handdestroy']);

//This Routes for the manufactured foods
Route::get('manufood',[ManufoodController::class,'manufoodlist']);
Route::post('manufood',[ManufoodController::class, 'manufoodStore']);
Route::get('manufood/{manufood_id}',[ManufoodController::class,'manufoodShow']);
Route::get('manufood/{manufood_id}/manufoodedit',[ManufoodController::class,'manufoodedit']);
Route::put('manufood/{manufood_id}/manufoodedit',[ManufoodController::class,'manufoodupdate']);
Route::delete('manufood/{manufood_id}/manufooddelete',[ManufoodController::class,'manufooddestroy']);

//This Routes for the mauitems controller
Route::get('manuitems',[ManuitemController::class,'manuitemslist']);
Route::post('manuitems',[ManuitemController::class,'manuitemStore']);
Route::get('manuitems/{manuitem_id}',[ManuitemController::class,'manuitemShow']);
Route::get('manuitems/{manuitem_id}/manuitemsedit',[ManuitemController::class,'mannuitemEdit']);
Route::put('manuitems/{manuitem_id}/manuitemsedit',[ManuitemController::class,'manuitemupdate']); 
Route::delete('manuitems/{manuitem_id}/manuitemsdelete',[ManuitemController::class,'manuitemdestroy']);

//This Routes for the Foodsales controller
Route::get('foodsales',[FoodsaleController::class,'foodsale']); 
Route::post('foodsales',[FoodsaleController::class, 'foodsaleStore']);
Route::get('foodsales/{foodsale_id}',[FoodsaleController::class,'foodsaleShow']);
Route::get('foodsales/{foodsale_id}/foodsaleedit',[FoodsaleController::class,'foodsaleedit']);
Route::put('foodsales/{foodsale_id}/foodsaleedit',[FoodsaleController::class,'foodsaleupdate']);
Route::delete('foodsales/{foodsale_id}/foodsaledelete',[FoodsaleController::class,'foodsaledestroy']);


//This Routes for the Handsales controller
Route::get('handsales',[ItemsaleController::class,'handsales']); 
Route::post('handsales',[ItemsaleController::class, 'handsaleStore']);
Route::get('handsales/{handsale_id}',[ItemsaleController::class,'handsaleShow']);
Route::get('handsales/{handsale_id}/handsaleedit',[ItemsaleController::class,'handsaleedit']);
Route::put('handsales/{handsale_id}/handsaleedit',[ItemsaleController::class,'handsaleupdate']);
Route::delete('handsales/{handsale_id}/handsaledelete',[ItemsaleController::class,'handsaledestroy']);





//This Route for dashboard cards
Route::get('dashboard/foodsale',[DashboardController::class,'TotalFoodsale']);
Route::get('dashboard/itemsale',[DashboardController::class,'TotalItemsale']);
Route::get('dashboard/totalsale',[DashboardController::class,'saleTotalAmount']);
Route::get('dashboard/totalpurchase',[DashboardController::class,'purchaseTotalAmount']);

//This Route for dashboard charts

Route::get('manucharts/getTotalFoodQtyByDate', [ChartController::class, 'getTotalFoodQtyByDate']);
Route::get('manucharts/getTotalItemQtyByDate', [ChartController::class, 'getTotalItemQtyByDate']);
Route::get('materialcharts/getMaterialQty', [ChartController::class, 'getAvailableQuantities']);

//this Route for notify low quantity
Route::get('notify/notifications', [NotifiController::class, 'checkLowQuantityMaterials']);
Route::delete('notify/notifications/{material_id}', [NotifiController::class, 'deleteNotification']);
