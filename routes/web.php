<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyProfileController;

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


Route::get('/', [FrontendFrontendController::class, 'index'])
        ->name('index');


#Web/Category
Route::get('category', [FrontendFrontendController::class, 'category'])
        ->name('category');
Route::get('view-category/{slug}', [FrontendFrontendController::class, 'viewcategory'])
        ->name('view-category');
Route::get('view-category/{cate_slug}/{prod_slug}', [FrontendFrontendController::class, 'productview']);


#Search
Route::get('product-list', [FrontendFrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendFrontendController::class, 'searchProduct']);


#Web/Product
Route::get('product', [FrontendProductController::class, 'productlist'])
        ->name('product');
Route::get('view-product/{prod_slug}', [FrontendFrontendController::class, 'product'])
        ->name('view-product');
Route::get('category1', [FrontendProductController::class, 'category']);


#Web/Blog
Route::get('blog', [FrontendBlogController::class, 'bloglist'])
        ->name('blog');
Route::get('view-blog/{blog_slug}', [FrontendBlogController::class, 'blogview'])
        ->name('view-blog');


#Web/Contact
Route::get('contact', [ContactController::class, 'contact'])
        ->name('contacts');
Route::post('sendcontact', [ContactController::class, 'sendcontact'])
        ->name('contact.store');


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-data', [WishlistController::class, 'wishlistcount']);


#Web/Cart
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);


#Web/Wishlist
Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

#Login-Google

// Google URL
Route::prefix('google')->name('google.')->group(function () {
        Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
        Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});


Route::middleware(['auth'])->group(function () {
        #Web/Cart
        Route::get('cart', [CartController::class, 'viewcart'])
                ->name('cart');


        #Web/Checkout
        Route::get('checkout', [CheckoutController::class, 'index'])
                ->name('checkout');
        Route::post('place-order', [CheckoutController::class, 'placeorder'])
                ->name('place-order');


        #Web/Order
        Route::get('my-orders', [UserController::class, 'index'])
                ->name('my-orders');
        Route::get('view-order/{id}', [UserController::class, 'view'])
                ->name('view-order/');


        #Web/MyProfile
        Route::get('my-profile', [MyProfileController::class, 'profile'])
                ->name('my-profile');
        Route::get('edit-my-profile/{id}', [MyProfileController::class, 'edit'])
                ->name('edit-profile');
        Route::put('update-profile/{id}', [MyProfileController::class, 'update'])
                ->name('update-profile');


        #Web/Rating
        Route::post('add-rating', [RatingController::class, 'add']);


        #Web/Review
        Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
        Route::post('add-review', [ReviewController::class, 'create']);
        Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
        Route::put('update-review', [ReviewController::class, 'update']);


        #Web/Wishlist
        Route::get('wishlist', [WishlistController::class, 'index'])
                ->name('wishlist');


        #Web/Razorpay
        Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);   //Checkout with UPI ID --> nightwing@upi


});


Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/dashboard', [FrontendController::class, 'index'])
                ->name('admin.dashboard');


        #Admin/Category
        Route::get('categories', [CategoryController::class, 'index'])
                ->name('admin.categories.index');
        Route::get('add-category', [CategoryController::class, 'add'])
                ->name('admin.categories.add');
        Route::post('insert-cateogry', [CategoryController::class, 'insert'])
                ->name('admin.categories.insert');
        Route::get('edit-cateogry/{id}', [CategoryController::class, 'edit'])
                ->name('admin.categories.edit');
        Route::put('update-cateogry/{id}', [CategoryController::class, 'update'])
                ->name('admin.categories.update');
        Route::get('delete-cateogry/{id}', [CategoryController::class, 'delete'])
                ->name('admin.categories.delete');


        #Admin/Product
        Route::get('products', [ProductController::class, 'index'])
                ->name('admin.products.index');
        Route::get('add-product', [ProductController::class, 'add'])
                ->name('admin.products.add');
        Route::post('insert-product', [ProductController::class, 'insert'])
                ->name('admin.products.insert');
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])
                ->name('admin.products.edit');
        Route::put('update-product/{id}', [ProductController::class, 'update'])
                ->name('admin.products.update');
        Route::get('delete-product/{id}', [ProductController::class, 'delete'])
                ->name('admin.products.delete');


        #Admin/Order
        Route::get('orders', [OrderController::class, 'index']);
        Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
        Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
        Route::get('order-history', [OrderController::class, 'orderhistory']);


        #Admin/User
        Route::get('users', [UserControllerAdmin::class, 'users']);
        Route::get('view-users/{id}', [UserControllerAdmin::class, 'viewuser']);


        #Admin/Contact
        Route::get('contacts', [AdminContactController::class, 'contacts'])
                ->name('contact');
        Route::get('delete-contact/{id}', [AdminContactController::class, 'delete'])
                ->name('admin.contacts.delete');


        #Admin/Blog
        Route::get('blogs', [BlogController::class, 'index'])
                ->name('admin.blog.index');
        Route::get('create', [BlogController::class, 'create'])
                ->name('admin.blog.create');
        Route::post('store', [BlogController::class, 'store'])
                ->name('admin.blog.store');
        Route::get('edit/{id}', [BlogController::class, 'edit'])
                ->name('admin.blog.edit');
        Route::put('update/{id}', [BlogController::class, 'update'])
                ->name('admin.blog.update');
        Route::get('delete/{id}', [BlogController::class, 'delete'])
                ->name('admin.blog.delete');
});
