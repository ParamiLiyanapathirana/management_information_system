<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UploadingContentController;
use Illuminate\Support\Facades\Route;
use App\Models\FreeApplication;
use App\Models\User;
use App\Models\Payment;
use App\Models\UploadingContent;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('free_learning_application/', function () {
    return view ('free_learning_application');
});

Route::get('payment_option/', function () {
    return view ('payment_option');
});

Route::get('bank_deposit/', function () {
    return view ('bank_deposit');
});

Route::get('upload_success/', function () {
    return view ('upload_success');
});

Route::get('final_amount/', function () {
    return view ('final_amount_online_payment');
});

Route::get('online_payment_success/', function () {
    return view ('online_payment_success');
});

Route::get('admin_free_learning/', function () {
    return view ('admin_free_learning_approve');
});

// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//----------------------------- Home page routes

Route::get('/footer',function(){
    return view ('home_page/footer');
});

Route::get('/',function(){
    return view ('home_page/home_uploading');
});

//-------------------------------- End of home page routes




// -----------------------------starting uploading section



//uploading materials view
Route::get('/uploading_materials',[UploadingContentController::class, 'displaymaterials']);


//zoom link upload view 
Route::get('/uploading_zoomlink',[UploadingContentController::class, 'displayUploadZoom']);
Route::post('uploadZoomlink',[UploadingContentController::class, 'storezoomlink']);


//pdf upload view
Route::get('/uploading_pdf',[UploadingContentController::class, 'displayUploadPDF']);
Route::post('uploadingPdf',[UploadingContentController::class, 'storepdf']);


//record upload view
Route::get('/uploading_recording',[UploadingContentController::class, 'displayUploadRecord']);
Route::post('uploadRecording',[UploadingContentController::class, 'storerecord']);


//select module view
Route::get('/select_module',function(){
    return view ('uploading_section/select_module');
});
Route::post('/submitgradesub',[UploadingContentController::class, 'selectSubjects']);


//teacher module view
Route::get('/teacher_module_view',[UploadingContentController::class, 'displaymoduleview']);



//student module view
Route::get('/student_module_view',function(){
    return view ('uploading_section/student_ module_view');
});



//-------------------------------------------- end of uploading section



// Route::get('/', function () {  
//     return view('welcome');
// });

/*Route::get('/viewBooks', function () {  
    return view('viewBooks');
});*/

//Route::get('/viewBooks','app\Http\Controllers\BooksController@index');
Route::get('/viewBooks',[BooksController::class,'index']);//index function in BooksController


Route::get('/download/{file}',[BooksController::class,'download']);//download book, come from view and go to controller
Route::get('/view/{id}',[BooksController::class,'showPdf']);



/*Route::get('/editBooks', function () { 
    return view('editBooks');
});*/




/*Route::get('/editDelete', function () { 
    return view('editDelete');
});*/
Route::get('editDelete',[BooksController::class,'editDelete']);

//edit
Route::get('/editBooks/{id}',[BooksController::class,'edit']);
Route::post('/editBooks/{id}',[BooksController::class,'update']);
//'BooksController@edit'

/*Route::get('/addBooks', function () {  
    return view('addBooks');
});*/
Route::get('/addBooks',[BooksController::class,'add']);//add book function 
Route::post('/addBooks',[BooksController::class,'store']);//store book in database

//Route::get('/chooseBooks',[BooksController::class,'choose']);
//Route::post('/chooseBooks',[BooksController::class,'storechooseBook']);

//delete book
Route::delete('/Delete/{book}',[BooksController::class,'delete']);


//serach function//
Route::get('search',[BooksController::class,'search']);

