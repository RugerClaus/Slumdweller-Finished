<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

// The following routes are page routes for the front page of the site excluding the admin panel.

Route::get('/', [PagesController::class, 'index']);

Route::get('/media', [PagesController::class, 'media']);

Route::get('/merch', [PagesController::class, 'merch']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/contact', [PagesController::class, 'contact']);

Route::get('/details', [PagesController::class, 'details']);

Route::get('/cart', [PagesController::class, 'cart'])->name('pages.cart');

// The following routes are page routes for the admin panel exclusively.

Route::get('/add_products', [AdminPanelController::class, 'addProducts']);

Route::get('/add_to_tour', [AdminPanelController::class, 'addToTour']);

Route::get('/product_manager', [AdminPanelController::class, 'productManager']);

Route::get('/tour_manager', [AdminPanelController::class, 'tourManager']);

Route::get('/tour_editor', [AdminPanelController::class, 'editTour']);

Route::get('/orders', [AdminPanelController::class, 'orders']);

Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.home');

Route::get('/mail', [AdminPanelController::class, 'mail'])->name('admin.mail');

Route::get('/editProductPage', [AdminPanelController::class, 'editProduct']);

Route::get('/problemreporting', [AdminPanelController::class, 'problem']);

Route::post('/replyTo', [AdminPanelController::class, 'reply']);

// The following routes are for the checkout system handled by stripe.

Route::post('/checkout', [StripePaymentController::class, 'checkout'])->name('checkout');

Route::get('/cancel', [StripePaymentController::class, 'cancel'])->name('checkout.cancel');

Route::get('/success', [StripePaymentController::class, 'success'])->name('checkout.success');

Route::get('/webhook', [StripePaymentController::class, 'webhook']);

// The following are routes for the main logic of the site.

Route::post('/addToCart', [CartController::class, 'addToCart']);

Route::get('/removeFromCart', [CartController::class, 'removeFromCart']);

Route::post('/send', [MailController::class, 'send']);

// The following are routes handling the main logic of the admin panel.

Route::get('/login', [CustomAuthController::class, 'index']);

Route::post('/logout', [CustomAuthController::class, 'signOut']);

Route::get('/registration', [CustomAuthController::class, 'regpage']);

Route::post('/register', [CustomAuthController::class, 'register']);

Route::post('/adminsignin', [CustomAuthController::class, 'authenticate']);

Route::post('/addproduct', [ProductController::class, 'create']);

Route::post('/editProductImages', [ProductController::class, 'updateImages']);

Route::post('/editProduct' , [ProductController::class, 'update']);

Route::post('/deleteProduct' , [ProductController::class, 'delete']);

Route::post('/editTour' , [TourController::class, 'update']);

Route::post('/deleteTour' , [TourController::class, 'delete']);

Route::post('/addToTour', [TourController::class, 'create']);

Route::post('/reply', [MailController::class, 'reply']);

Route::post('/deleteEmail', [MailController::class, 'delete']);

Route::get('/api/orders', [OrderController::class, 'index']);

Route::post('/sendTicket', [TicketController::class, 'send'])->name('send.ticket');