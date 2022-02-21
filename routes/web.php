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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/*Route::get('/', function()  {
    dd('hi');
});*/

Route::get('/clear-cache', function () {

    echo 333;

    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache Clear";
});


// for client part ---------------------
Route::get('/', 'Client\ClientController@index')->name('/');
Route::get('/price-filter', 'Client\ClientController@price_filter')->name('price-filter');
Route::get('/brand-price-filter', 'Client\ClientController@brand_price_filter')->name('brand-price-filter');

Route::get('/category/{id}', 'Client\ClientController@category')->name('category-products');
Route::get('/sub-category/{id}', 'Client\ClientController@subCategory')->name('sub-category');
Route::get('/brand/products/{id}', 'Client\ClientController@brandProducts')->name('brand-product');
Route::get('/product/details/{id}/{category_id}', 'Client\ClientController@productDetails')->name('product');
Route::get('/client-login', 'Client\CheckoutController@login')->name('client-login');
Route::post('/login-process', 'Client\CheckoutController@loginProcess')->name('login-process');
Route::get('/client-register', 'Client\CheckoutController@register')->name('client-register');
Route::get('/verifyemailfirst', 'Client\CheckoutController@verify_email_first')->name('verifyemailfirst');
Route::get('/verify/{email}/{varify_token}', 'Client\CheckoutController@send_email_done')->name('sendemaildone');
Route::post('/registration-process', 'Client\CheckoutController@registerProcess')->name('registration-process');
Route::get('/client-logout', 'Client\CheckoutController@logout')->name('client-logout');
Route::get('/about/', 'Client\ClientController@about')->name('about');
Route::get('/contact-us/', 'Client\ClientController@contactUs')->name('contact-us');
Route::post('/contact/form/', 'Client\ClientController@contactSubmit')->name('contact-submit');
Route::get('/news-feed/', 'Client\ClientController@newsFeed')->name('news-feed');
Route::get('/client/profile', 'Client\ClientController@editProfile')->name('client-profile');
Route::post('/client/update-profile', 'Client\ClientController@updateProfile')->name('client-update-profile');
Route::get('/order-list','Client\ClientController@orderList')->name('order-list');
Route::get('/order-list2/{id}','Client\ClientController@orderList2')->name('order-list2');
Route::get('/order-details/{id}','Client\ClientController@orderDetails')->name('order-details');
Route::post('/product-review','Client\ClientController@productReview')->name('product-review');
Route::post('/search','Client\ClientController@search')->name('search');
// get client information---------
Route::get('/getclientInfo', 'Client\CheckoutController@getclientinfo')->name('getclientInfo');


// for cart management------
Route::get('/add-to-cart', 'Client\CartController@add_to_cart')->name('add-to-cart');
Route::get('/show-cart', 'Client\CartController@show_cart')->name('show-cart');
Route::get('/isCartExist', 'Client\CartController@isCartExist');
Route::get('/delete-cart/{id}', 'Client\CartController@delete_cart')->name('delete-cart');
Route::get('/update-cart', 'Client\CartController@update_cart')->name('update-cart');

// confirm order-------------
Route::post('/coupon-check', 'Client\CouponController@check')->name('coupon-check');
Route::post('/confim-order', 'Client\OrderController@confirm_order')->name('confim-order');



// end client part----------------------



Route::get('/home', 'HomeController@index')->name('home');
// for Admin part------------------------------
Route::group(['middleware' => ['auth']], function () {
// for category-------------
Route::get('/add-category', 'Admin\Category\CategoryController@add_category')->name('add-category');
Route::post('/save-category', 'Admin\Category\CategoryController@save_category')->name('save-category');
Route::get('/manage-category', 'Admin\Category\CategoryController@manage_category')->name('manage-category');
Route::get('/details-category/{id}', 'Admin\Category\CategoryController@details_category')->name('details-category');
Route::get('/edit-category/{id}', 'Admin\Category\CategoryController@edit_category')->name('edit-category');
Route::post('/update-category', 'Admin\Category\CategoryController@update_category')->name('update-category');



// for admin brand part........................................................
Route::get('/manage-brand', 'Admin\Brand\BrandController@manage_brand')->name('manage-brand');
Route::post('/manage-brand', 'Admin\Brand\BrandController@save_brand')->name('save-brand');

// for subcategory ----------
Route::get('/manage-subcategory/{id}', 'Admin\Category\CategoryController@manage_subcategory')->name('manage-subcategory');
Route::get('/add-subcategory/{id}', 'Admin\Category\CategoryController@add_subcategory')->name('add-subcategory');
Route::post('/save-subcategory', 'Admin\Category\CategoryController@save_subcategory')->name('save-subcategory');
Route::get('/details-subcategory/{id}', 'Admin\Category\CategoryController@details_subcategory')->name('details-subcategory');
Route::get('/edit-subcategory/{id}', 'Admin\Category\CategoryController@edit_subcategory')->name('edit-subcategory');
Route::post('/update-subcategory', 'Admin\Category\CategoryController@update_subcategory')->name('update-subcategory');


// for slider part ----------
Route::get('/manage-slider', 'Admin\Slider\SliderController@manage_slider')->name('manage-slider');
Route::get('/add-slider', 'Admin\Slider\SliderController@add_slider')->name('add-slider');
Route::post('/save-slider', 'Admin\Slider\SliderController@save_slider')->name('save-slider');
Route::get('/slider-details/{id}', 'Admin\Slider\SliderController@slider_details')->name('slider-details');
Route::get('/edit-slider/{id}', 'Admin\Slider\SliderController@edit_slider')->name('edit-slider');
Route::post('/update-slider', 'Admin\Slider\SliderController@update_slider')->name('update-slider');
Route::get('/delete-slider/{id}', 'Admin\Slider\SliderController@delete_slider')->name('delete-slider');

// for specification header..................
Route::get('/add-heading', 'Admin\Heading\HeadingController@add_heading')->name('add-heading');
Route::post('/save-heading', 'Admin\Heading\HeadingController@save_heading')->name('save-heading');
Route::get('/manage-heading', 'Admin\Heading\HeadingController@manage_heading')->name('manage-heading');

Route::get('/edit-heading/{id}', 'Admin\Heading\HeadingController@edit_heading')->name('edit-heading');
Route::post('/update-heading', 'Admin\Heading\HeadingController@update_heading')->name('update-heading');

// for delete heading from admin product details page..........
Route::get('/delete-spcification/{id}', 'Admin\Product\ProductController@delete_spcification')->name('delete-spcification');

// for type part --------
Route::get('/manage-type', 'Admin\Type\TypeController@manage_type')->name('manage-type');
Route::get('/add-type', 'Admin\Type\TypeController@add_type')->name('add-type');
Route::post('/save-type', 'Admin\Type\TypeController@save_type')->name('save-type');
Route::get('/type-details/{id}', 'Admin\Type\TypeController@type_details')->name('type-details');
Route::get('/edit-type/{id}', 'Admin\Type\TypeController@edit_type')->name('edit-type');
Route::post('/update-type', 'Admin\Type\TypeController@update_type')->name('update-type');

// for product ---------------------
Route::get('/manage-product', 'Admin\Product\ProductController@manage_product')->name('manage-product');

Route::post('/admin-search-filter', 'Admin\Product\ProductController@admin_search_filter')->name('admin-search-filter');

Route::get('/add-product', 'Admin\Product\ProductController@add_product')->name('add-product');
Route::post('/save-product', 'Admin\Product\ProductController@save_product')->name('save-product');
Route::get('/edit-product/{id}', 'Admin\Product\ProductController@edit_product')->name('edit-product');
Route::post('/update-product','Admin\Product\ProductController@update_product')->name('update-product');

Route::get('/edit-spec/{id}', 'Admin\Product\ProductController@edit_spec')->name('edit-spec');
Route::post('/update-spec/{id}','Admin\Product\ProductController@update_spec')->name('update-spec');
Route::get('/add-spec/{id}', 'Admin\Product\ProductController@add_spec')->name('add-spec');
Route::post('/add-spec-process/', 'Admin\Product\ProductController@add_spec_process')->name('add-spec-process');
// start create client from admin panel =====================================================================
// Route::get('/manage-client-admin', 'Admin\Product\ProductController@index')->name('manage-client-admin');
// end create client from admin panel =======================================================================

Route::get('/product-details/{id}', 'Admin\Product\ProductController@product_details')->name('product-details');
Route::post('/save-colorsize', 'Admin\ColorSize\ColorSizeController@save_size_color')->name('save-colorsize');
// for save multiple product image-------------
Route::post('/save-product-image', 'Admin\ProductImage\ProductImageController@save_productImage')->name('save-product-image');
// for delete multiple product image-------------
Route::get('/productiamge-delete/{id}', 'Admin\ProductImage\ProductImageController@productImage_delete')->name('productiamge-delete');
// for vendor management.............................................
Route::get('/vendor-manage', 'Admin\VendorManagement\VendorManagementController@vendor_manage')->name('vendor-manage');
// for active vendor authentication request----------------
Route::get('/accept-request/{id}', 'Admin\VendorManagement\VendorManagementController@accept_request')->name('accept-request');
// for deactive vendor authentication request----------------
Route::get('/cancel-request/{id}', 'Admin\VendorManagement\VendorManagementController@cancel_request')->name('cancel-request');

// for client management........................................................
Route::get('/client-manage', 'Admin\ClientManagement\ClientManagementController@client_manage')->name('client-manage');
Route::get('/client-create', 'Admin\ClientManagement\ClientCreationController@client_create')->name('client-create');
Route::get('/client-edit/{id}', 'Admin\ClientManagement\ClientCreationController@edit')->name('client-edit');
Route::post('/registration-update', 'Admin\ClientManagement\ClientCreationController@update')->name('registration-update');
Route::get('/client-active/{id}', 'Admin\ClientManagement\ClientManagementController@active')->name('client-active');

Route::get('/client-deactive/{id}', 'Admin\ClientManagement\ClientManagementController@deactive')->name('client-deactive');

Route::get('/vendor-create', 'Admin\VendorManagement\VendorCreationController@vendor_create')->name('vendor-create');
Route::get('/vendor-edit/{id}', 'Admin\VendorManagement\VendorCreationController@edit')->name('vendor-edit');
Route::post('/save_update', 'Admin\VendorManagement\VendorCreationController@save_update')->name('save_update');





// for getting category and brand ---------------
Route::get('/get-categories/{id}','Api\apiController@getcategories');
Route::get('/get-brand/{id}','Api\apiController@getbrands');


// for admin order management------------
Route::get('/admin-manage-order','Admin\Order\OrderController@manageOrder')->name('admin-manage-order');
Route::get('/admin-manage-order-details/{id}','Admin\Order\OrderController@orderDetails')->name('admin-manage-order-details');
Route::get('/admin-order-accept/{id}','Admin\Order\OrderController@acceptOrder')->name('admin-order-accept');
Route::get('/admin-cancel-order/{id}','Admin\Order\OrderController@cancelOrder')->name('admin-cancel-order');
Route::get('/admin-delete-order/{id}','Admin\Order\OrderController@deleteOrder')->name('admin-delete-order');

// for admin order filter...........................................
Route::post('/order-search-filter','Admin\Order\OrderController@order_search_filter')->name('order-search-filter');
});


// vendor part -----------------------
Route::get('/vendor-login', 'Vendor\Vendor_Auth\AuthController@vendor_login')->name('vendor-login');
Route::get('/vendor-register', 'Vendor\Vendor_Auth\AuthController@vendor_register')->name('vendor-register');
Route::post('/vendor-save', 'Vendor\Vendor_Auth\AuthController@vendor_save')->name('vendor-save');
Route::post('/vendor-new-login', 'Vendor\Vendor_Auth\AuthController@vendor_new_login')->name('vendor-new-login');
Route::get('/vendor-logout','Vendor\Vendor_Auth\AuthController@vendor_logout')->name('vendor-logout');
Route::get('/vendor-dashboard','Vendor\Vendor_Auth\AuthController@vendor_dashboard')->name('vendor-dashboard');

// vendor brand ------------------------
Route::get('/vendor-manage-brand','Vendor\brand\brandController@vendor_manage_brand')->name('vendor-manage-brand');
Route::post('/vendor-save-brand','Vendor\brand\brandController@vendor_save_brand')->name('vendor-save-brand');
Route::get('/vendor-edit-brand/{id}','Vendor\brand\brandController@vendor_edit_brand')->name('vendor-edit-brand');



// vendor  product ---------------------
Route::get('/vendor-add-product','Vendor\product\ProductController@vendor_add_product')->name('vendor-add-product');
Route::post('/vendor-save-product','Vendor\product\ProductController@vendor_save_product')->name('vendor-save-product');
Route::get('/vendor-manage-product','Vendor\product\ProductController@vendor_manage_product')->name('vendor-manage-product');
Route::get('/vendor-details-product/{id}','Vendor\product\ProductController@vendor_details_product')->name('vendor-details-product');
Route::get('/vendor-edit-product/{id}','Vendor\product\ProductController@vendor_edit_product')->name('vendor-edit-product');
Route::post('/vendor-update-product','Vendor\product\ProductController@vendor_update_product')->name('vendor-update-product');


// vendor product image------------------
Route::post('/vendor-add-more-image','Vendor\product_image\ProductImageController@vendor_addmoreimage')->name('vendor-add-more-image');
Route::post('/vendor-delete-more-image','Vendor\product_image\ProductImageController@vendor_deletemoreimage')->name('vendor-delete-more-image');



// Vendor color_size
Route::post('/vendor-save-sizecolor','Vendor\color_size\ColorSizeController@vendor_save_sizecolor')->name('vendor-save-sizecolor');



// vendor order management--------------
Route::get('/vendor/manage-order','Vendor\order\OrderController@manageOrder')->name('vendor-manage-order');
Route::get('/vendor-order-accept/{id}','Vendor\order\OrderController@acceptOrder')->name('vendor-order-accept');
Route::get('/vendor-order-cancel/{id}','Vendor\order\OrderController@cancelOrder')->name('vendor-order-cancel');


//vendor pdf upload
Route::post('/vendor/pdf-upload','Vendor\order\OrderController@uploadPdf')->name('pdf-upload');

//purchase
Route::get('/purchase-create', 'Admin\Purchase\PurchaseController@purchase_create')->name('purchase-create');
Route::post('/save-purshase-transection', 'Admin\Purchase\PurchaseController@save_transection')->name('save-purshase-transection');
Route::get('/all-product', 'Admin\Purchase\PurchaseController@products');
Route::get('/product-wise-price/{id}', 'Admin\Purchase\PurchaseController@product_wise_price');


// for sales .. ..
Route::get('/sales-create', 'Admin\Sales\SalesController@index')->name('sales-create');

