<?php

use App\Http\Controllers\AuthenficationController;
use App\Http\Controllers\PhonNumberController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthenficationController::class,"login"]);

Route::group(["middleware" => "auth:api"], function(){
    Route::apiResources([
     'phon-numbers' =>  PhonNumberController::class 
    ]);
    //loug out
    Route::get('/logout',[AuthenficationController::class,"logout"]);
    //users routers
    Route::get('/users',[UserController::class,"index"]);
    Route::get('/users/{id}',[UserController::class,"show"]);
    Route::put('/users',[UserController::class,"update"]);
    Route::delete('/users',[UserController::class,"delete"]);

});

Route::post('/users',[UserController::class,"store"]);


/*Route::apiResources([
   'users' =>UserController::class,
   //'phon-numbers' =>  PhonNumberController::class 
]);*/


/**
 * Get api/users => index()
 * GET api/users/user => show()
 * post api/users => store()
 * put api/users/[id] => update()
 * delete api/users/[id] => delete()
 */
/*Route::group(["middleware" => "auth:api"], function(){
    Route::apiResources([
    'products' => ProductController::class 
]);
    
});*/


