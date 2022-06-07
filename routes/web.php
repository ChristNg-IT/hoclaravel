<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\UsersController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
//
//Route::get('/tin-tuc','HomeController@GetNews')->name('news');
//
//Route::get('/chuyen-muc/{id}',[HomeController::class,'getCategory'])->name('category');//nên dùng
//
//Route::get('/post',function(){
//    return view('form');
//    //return 'Phương thức get của path /post';
//});
//
//Route::post('/post',function(){
//    return 'Phương thức post của path /post';
//});
//Route::prefix('admin')->group(function(){
//    Route::get('unicode/{id?}/{slug?}.html',function($id=null,$slug=null){//lúc này id không bắt buộc phải khai báo
//        $content = 'Phương thức Get của path /unicode với tham số: ';
//        $content.='id = '.$id.'<br/>';
//        $content.='slug = '.$slug;
//        return $content;
//    })->where(
//        [
//            'slug'=>'.+',
//            'id'=>'[0-9]+'
//        ]
//        //where('id','[0-9]+')->where('slug','.+')
//        //where('id','\d+')->where('slug','.+')
//    )->name('admin.tin-tuc');
//    Route::get('show-form',function(){
//        return view('form');
//
//    })->name('admin.show-form');
//    Route::prefix('products')->middleware('checkPermission')->group(function(){
//        Route::get('/',function(){
//            return 'Danh sách sản phẩm';
//        });
//        Route::get('add',function(){
//            return 'Thêm sản phẩm';
//        })->name('admin.products.add');
//        Route::get('edit',function(){
//            return 'Sửa sản phẩm';
//        });
//        Route::get('delete',function(){
//            return 'Xóa sản phẩm';
//        });
//    });
//})

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth.admin');

ROute::get('/san-pham',[HomeController::class,'products'])->name('products');

Route::get('/them-san-pham',[HomeController::class,'getAdd']);

Route::post('/them-san-pham',[HomeController::class,'postAdd'])->name('postAdd');

Route::put('/them-san-pham',[HomeController::class,'putAdd']);

Route::get('/demo-response',function(){
    // //$content = '<h2>Học lập trình tại Unicode</h2>';
    // $content = json_encode([
    //     'Item 1',
    //     'Item 2',
    //     'Item 3'
    // ]);
    // $response = (new Response($content))->header('Content-type','application/json');
    // // $response=response('Học lập trình tại Unicode',404);
    // $response = (new Response())->cookie('unicode','Training PHP - Larravel',30);
    // return $response;
    return view('clients/demo-test');
})->name('demo-response');

Route::post('demo-response',function(Request $request){
    // return $request->cookie('unicode');
    if(!empty($request->username)){
        return back()->withInput()->with('mess','Validate thành công');
    }

    return redirect(route('demo-response'))->with('mess','Validate không thành công');
});

Route::get('download-image',[HomeController::class,'downloadImage'])->name('downloadImage');
//Client Route
Route::middleware('auth.admin')->prefix('category')->group(function(){
    //danh sách chuyên mục
    Route::get('/',[CategoriesController::class,'index'])->name('categories.list');

    //Lấy chi tiết 1 chuyên mục (Áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id?}',[CategoriesController::class,'getCategories'])->name('categories.edit');

    //Xử lý update chuyên mục
    Route::post('/edit/{id}',[CategoriesController::class,'updateCategory']);

    //Hiển thị form add dữ liệu 
    Route::get('/add',[CategoriesController::class,'addCategory'])->name('categories.add');

    //Xử lý thêm chuyên mục
    Route::post('/add',[CategoriesController::class,'handleAddCategory']);

    //Xóa chuyên mục
    //Route::delete('/delete/{id}',CategoriesController::class,'deleteCategory')->name('categories.delete');

    //hiển thị form upload
    Route::get('/upload',[CategoriesController::class,'getFile']);

    //Xử lý file
    Route::post('/upload',[CategoriesController::class,'handleFile'])->name('categories.upload');

    Route::get('san-pham/{id}',[HomeController::class,'getProductDetail']);
});

//Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function(){
        Route::get('/',[DashboardController::class,'index']);
        Route::resource('products',ProductsController::class)->middleware('auth.admin.product');
});

//Người dùng
Route::prefix('users')->name('users.')->group(function(){
    Route::get('/',[UsersController::class,'index'])->name('index');

    Route::get('/add',[UsersController::class,'add'])->name('add');
    Route::post('/add',[UsersController::class,'postAdd'])->name('post-add');

    Route::get('edit/{id}',[UsersController::class,'getEdit'])->name('edit');
    Route::post('updated',[UsersController::class,'postEdit'])->name('post-edit');

    Route::get('delete/{id}',[UsersController::class,'delete'])->name('delete');
    
}); 