<?php

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

//Auth
Auth::routes();

//Admin
Route::group(['prefix' =>'/admin', 'middleware' => ['admin', 'auth']], function () {
         Route::get('', function () {
//             return redirect('/admin/list_product');
             return view('admin.nav');
         });
    //Manufacturer
        Route::get('/list_manufacturer', 'Admin\AdminManufacturerController@index');
        Route::get('/add_manufacturer', 'Admin\AdminManufacturerController@create');
        Route::post('/add_manufacturer', 'Admin\AdminManufacturerController@store');
        Route::get('/edit_manufacturer/{id}', 'Admin\AdminManufacturerController@edit');
        Route::post('/edit_manufacturer/{id}', 'Admin\AdminManufacturerController@update');
        Route::post('/delete_manufacturer/{id}', 'Admin\AdminManufacturerController@destroy');
    //Category
        Route::get('/list_category', 'Admin\AdminCategoryController@index');
        Route::get('/add_category', 'Admin\AdminCategoryController@create');
        Route::post('/add_category', 'Admin\AdminCategoryController@store');
        Route::get('/edit_category/{id}', 'Admin\AdminCategoryController@edit');
        Route::post('/edit_category/{id}', 'Admin\AdminCategoryController@update');
        Route::post('/delete_category/{id}', 'Admin\AdminCategoryController@destroy');
    //Product
        Route::get('/list_product', 'Admin\AdminProductController@index');
        Route::get('/add_product', 'Admin\AdminProductController@create');
        Route::post('/add_product', 'Admin\AdminProductController@store');
        Route::post('/delete_product/{id}', 'Admin\AdminProductController@destroy');
        Route::get('/edit_product/{id}', 'Admin\AdminProductController@edit');
        Route::post('/edit_product/{id}', 'Admin\AdminProductController@update');
    //User
        Route::get('/list_user', 'Admin\AdminUserController@index');
        Route::get('/edit_user/{id}', 'Admin\AdminUserController@edit');
        Route::post('/edit_user/{id}', 'Admin\AdminUserController@update');
    //Admin
        Route::get('/list_admin', 'Admin\AdminManagerController@index');
        Route::get('/edit_admin/{id}', 'Admin\AdminManagerController@edit');
        Route::post('/edit_admin/{id}', 'Admin\AdminManagerController@update');
    //Feedback
        Route::get('/list_feedback', 'Admin\AdminFeedbackController@index');
    //order
        Route::get('/list_order', 'Admin\AdminOrderController@index');
        Route::get('/detail_order/{id}', 'Admin\AdminOrderController@show');
    //Shipping
        Route::get('/shipping', 'Admin\AdminShippingController@index');
        Route::get('/shipping/{id}', 'Admin\AdminShippingController@edit');
        Route::post('shipping/update_status/{id}', 'Admin\AdminShippingController@update');
        Route::get('shipping/list_product/{id}', 'Admin\AdminShippingController@show');
});

//Client

    //Home
    Route::get('/', function () {
       return redirect('/home');
    });
    Route::get('/home', 'Client\HomeClientController@index')->name('home');

    //Customer
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/tracking/{id}', 'Client\TrackingOrderController@show');
        Route::get('/profile', 'AccountController@edit');
        Route::post('/updateProfile', 'AccountController@update');
    });

    //Cart
    Route::get('/cart', 'Client\CartClientController@index');
    Route::post('/addToCart/{id}', 'Client\CartClientController@store');
    Route::post('/updateCart/{id}', 'Client\CartClientController@update');
    Route::post('/deleteCart/{id}', 'Client\CartClientController@destroy');

    //Credit
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/credit', 'Client\CreditController@index');
        Route::post('/credit', 'Client\CreditController@store');
    });

    //Product
    Route::get('/detail_product/{id}', 'Client\ProductController@show');
    Route::get('/category','Client\ProductController@index');
    Route::get('/category_{id_category}_{id_manufacturer}','Client\ProductController@category');

    //Feedback
    Route::get('/feedback','Client\FeedbackClientController@index');
    Route::post('/send_feedback', 'Client\FeedbackClientController@store');

    //Search
    Route::get('/search', 'Client\ProductController@search');

    //Checkout
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/checkout', 'Client\BillClientController@index');
        Route::post('/checkout', 'Client\BillClientController@store');
    });

    //Blog - Contact
    Route::get('/contact', 'Controller@contact');

    //HistoryBill
    Route::group(['middleware' => ['auth']], function () {
        Route::get('history_order', 'Client\HistoryBillController@index');
        Route::get('bill_{id}', 'Client\HistoryBillController@show');
    });
