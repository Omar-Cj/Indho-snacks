<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Artisan;

Route::get('/cc', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
	return 'DONE';
});

Route::group(['middleware' => ['XSS']], function () {

    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return "Cache is cleared";
    });

    Route::get('/routecache', function () {
        Artisan::call('route:clear');
        return "config is cleared";
    });

    Route::get("/admin", "AuthenticationController@showlogin")->name("showlogin");
    Route::post("postlogin", "AuthenticationController@postlogin")->name("postlogin");
    Route::get("logout", "AuthenticationController@logout")->name("logout");

    //website
    Route::get("/", "frontController@index")->name('website.home');
    Route::get("addcart/{item_id}", "Cartcontroller@addcart");
    Route::get("detailitem/{id}", "frontController@detailitem");
    Route::post("item-review", "frontController@itemReview")->name('item.review');
    Route::get("addcartitem", "Cartcontroller@addcartitem");
    Route::get("sharesoicalmedia/{media_id}/{item_id}", "frontController@sharesoicalmedia");
    Route::get("managecart", "Cartcontroller@managecart");
    Route::get("cartdetails", "frontController@cartdetails");
    Route::get("deletecartitem/{id}", "Cartcontroller@deletecart");
    route::get("cartqtyupdate/{id}/{qty}/{op}", "Cartcontroller@cartupdate");
    Route::get("userregister", "AppuserController@register");
    Route::get("userlogin", "AppuserController@login");
    Route::get("user_logout", "AppuserController@logout");
    Route::get("forgotpassword", "AppuserController@forgotpassword");
    route::get("aboutus", "frontController@showaboutus");
    route::get("shop/category/{id}/{name}", "frontController@shopCategory")->name('shop.category');
    route::get("shop", "frontController@shop")->name('all.item');
    route::get("service", "frontController@showservice");
    route::get("contactus", "frontController@showcontactus");
    Route::get("termofuse", "frontController@termofuse");
    Route::get("category/{id}", "frontController@category_list");
    Route::get("resetpassword/{code}", "AppuserController@resetpwd")->name('resetpassword.code');
    Route::any("checkout", "frontController@checkout");
    Route::any("resetnewpwd", "AppuserController@resetpassword");
    Route::any("placeorder", "AppuserController@placeorder");
    Route::get("myaccount", "frontController@myaccount");
    Route::get("checkuserpassword/{cpwd}", "AppuserController@checkuserpassword");
    Route::get("changeuserpwd", "AppuserController@changeuserpwd");
    Route::post("updateuserprofile", "AppuserController@updateuserprofile");
    Route::post("savecontact", "frontController@savecontact");
    Route::get("viewdetails/{id}", "frontController@viewdetails");
    Route::get('stripe', 'PaymentController@stripe');
    Route::post('/make-payment', 'PaymentController@pay');
    Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'PaypalController@payWithPaypal',));
    Route::post('paypal', array('as' => 'paypal', 'uses' => 'PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status', 'uses' => 'PaypalController@getPaymentStatus',));
});

//admin

Route::group(['middleware' => ['admincheckexiste']], function () {

    Route::get("dashboard", "AuthenticationController@showdashboard")->name("showdashboard");
    Route::get("setting/{id}", "AuthenticationController@editsetting");
    Route::post("updatesetting", "AuthenticationController@updatesetting");

    Route::get("printorder/{id}", "OrderController@print");
    Route::any("saveresdetail", "AuthenticationController@saveresdetail");
    Route::any("savesoicalsetting", "AuthenticationController@savesoicalsetting")->name("savesoicalsetting");
    Route::any("savepaymentdata", "AuthenticationController@savepaymentdata");
    Route::any("savewebimage", "AuthenticationController@savewebimage");

    Route::get('item-review', 'AuthenticationController@itemReview')->name('item.review');
    Route::get('item-review-edit/{id}', 'AuthenticationController@itemReviewEdit')->name('item.review.edit');
    Route::post('item-review-update/{id}', 'AuthenticationController@itemReviewUpdate')->name('item.review.update');
    Route::get('item-review-delete/{id}', 'AuthenticationController@itemReviewDelete')->name('item.review.delete');

    Route::get("index", "PagesController@index");
    Route::post("savewebpage/{id}", "PagesController@savewebpage")->name('savewebpage');

    // slider
     Route::get("sliders", "SliderController@index")->name("slider.index");
     Route::post("sliders/store", "SliderController@store")->name("slider.store");
     Route::post("sliders/update/{id}", "SliderController@update")->name("slider.update");
     Route::get("sliders/delete/{id}", "SliderController@delete")->name("slider.delete");

    // discount Banner
    Route::get("banners", "BannerController@index")->name("banner.index");
    // Route::post("banner/store", "BannerController@store")->name("banner.store");
    Route::post("banner/update/{id}", "BannerController@update")->name("banner.update");
    // Route::get("banner/delete/{id}", "BannerController@delete")->name("banner.delete");

    // testimonial
    Route::get("testimonials", "TestimonialController@index")->name("review.index");
    Route::post("testimonials/store", "TestimonialController@store")->name("review.storte");
    Route::post("testimonials/update/{id}", "TestimonialController@update")->name("review.update");
    Route::get("testimonials/delete/{id}", "TestimonialController@delete")->name("review.delete");
    //menu category
    Route::get("category", "CategoryController@showcategory")->name("showcategory");
    Route::get("categorydatatable", "CategoryController@categorydatatable")->name("categorydatatable");
    Route::post("add_menu_cateogry", "CategoryController@addcateogry")->name("add_menu_cateogry");
    Route::get("deletemenu/{id}", "CategoryController@deletemenu")->name("deletemenu");
    Route::get("editmenu/{id}", "CategoryController@editmenu")->name("editmenu");
    Route::post("updatecategory", "CategoryController@updatecategory")->name("updatecategory");
    Route::get("changesettingorderstatus/{status}", "AuthenticationController@changesettingorderstatus");
    Route::get("orders", "AuthenticationController@AllOrder");
    //menu item
    Route::get("menuitem", "ItemController@index")->middleware('admincheckexiste');
    Route::get("itemdatatable", "ItemController@itemdatatable")->name('itemdatatable');
    Route::post("add_menu_item", "ItemController@add_menu_item")->name("add_menu_item");
    Route::get("edititem/{id}", "ItemController@edititem")->name("edititem");
    Route::post("update_menu_item", "ItemController@update_menu_item")->name("update_menu_item");
    Route::get("getitem/{id}", "ItemController@getitem")->name("getitem");
    Route::get("deleteitem/{id}", "ItemController@delete");
    Route::get("contactusls", "CityController@contactusls");
    Route::get("contactdatatable", "CityController@contactdatatable");
    //menu ingredients
    Route::get("menuingredients", "IngredientsController@index");
    Route::get("ingredientsdatatable", "IngredientsController@ingredientsdatatable")->name('ingredientsdatatable');
    Route::post("add_menu_ingre", "IngredientsController@add_menu_ingre")->name("add_menu_ingre");
    Route::get("editing/{id}", "IngredientsController@editing")->name("editing");
    route::post("update_menu_ingre", "IngredientsController@update_menu_ingre")->name("update_menu_ingre");
    Route::get("deleteinge/{id}", "IngredientsController@delete");
    //user
    Route::get("users", "AuthenticationController@showuser");
    Route::get("userdatatable", "AuthenticationController@userdatatable")->name("userdatatable");
    Route::get("deleteuser/{id}", "AuthenticationController@deleteuser");
    //deliveryboy
    Route::get("deliveryboys", "DeliveryController@index");
    Route::get("deliverydatatable", "DeliveryController@deliverydatatable")->name("deliverydatatable");
    Route::post("add_delivery_boy", "DeliveryController@add_delivery_boy")->name("add_delivery_boy");
    Route::get("deleteboy/{id}", "DeliveryController@delete");
    Route::get("editdeliveryboys/{id}", "DeliveryController@editdeliveryboys");
    Route::post("update_delivery_boy", "DeliveryController@update_delivery_boy");
    //city
    Route::get("city", "CityController@showcity");
    Route::get("citydatatable", "CityController@citydatatable");
    Route::post("add_city", "CityController@addcity");
    Route::get("editcity/{id}", "CityController@editcity");
    Route::post("update_city", "CityController@update_city");
    Route::get("deletecity/{id}", "CityController@delete");
    //notification
    Route::get("sendnotification", "NotificationController@index");
    Route::get("notificationdatatable", "NotificationController@notificationdatatable")->name("notificationdatatable");
    Route::post("add_notification", "NotificationController@addnotification");

    Route::get("updatekey/{key}", "NotificationController@updatekey")->name("updatekey");
    Route::post("updatekeydata", "NotificationController@updatekeydata")->name("updatekeydata");

    Route::get("editprofile", "AuthenticationController@editprofile")->name("editprofile");
    Route::post("updateprofile", "AuthenticationController@updateprofile")->name("updateprofile");

    Route::get("changepassword", "AuthenticationController@changepassword")->name("changepassword");
    Route::get("samepwd/{id}", "AuthenticationController@check_password_same");
    Route::post("updatepassword", "AuthenticationController@updatepassword");

    Route::get("orderdatatable", "OrderController@orderdatatable");
    Route::get("deleteorder/{id}", "OrderController@deleteorder")->name("deleteorder");
    Route::get("actionorder/{id}/{status}", "OrderController@orderaction")->name("orderaction");
    Route::get("getorderinfo/{id}", "OrderController@getorderinfo")->name("getorderinfo");

    Route::get("changecurreny/{val}", "AuthenticationController@changecurreny");
    Route::post("assignorder", "OrderController@assignorder");
    Route::get("readyforpickup/{id}/{status}", "OrderController@readyforpickup");
    Route::get("waitingforpickup/{id}", "OrderController@waitingforpickup");
    Route::get("notification/{id}", "OrderController@notification");

});

Route::group(['prefix' => 'deliveryboy'], function () {
    Route::get("/", "DeliveryController@login")->name('deliveryboy.login');
    Route::post("postlogin", "DeliveryController@postlogin");

    Route::group(['middleware' => ['deliveryboy']], function () {
        Route::get('dashboard', "DeliveryController@dashboard");
        Route::get("logout", "DeliveryController@logout");

        Route::get("editprofile", "DeliveryController@editprofile")->name("editprofile");
        Route::post("updateprofile", "DeliveryController@updateprofile")->name("updateprofile");

        Route::get("orderhistory", "DeliveryController@orderhistory");
        Route::get("orderhistorydatatable", "DeliveryController@orderhistorydatatable");

        Route::get("changepassword", "DeliveryController@changepassword")->name("changepassword");
        Route::get("samepwd/{id}", "DeliveryController@check_password_same");
        Route::post("updatepassword", "DeliveryController@updatepassword");

        Route::get("changeattendace/{status}", "DeliveryController@changeattendace");
        Route::get("orderdatatable", "DeliveryController@orderdatatable");
        Route::get("getorderinfo/{id}", "OrderController@getorderinfo")->name("getorderinfo");
        Route::get("outofdelivery/{id}", "DeliveryController@outofdelivery");
        Route::get("ordercomplete/{id}", "DeliveryController@ordercomplete");
    });

});

