<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\ServiceCenterController;

//*backend cotroller are goes here
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\ConciergeServiceController;
use App\Http\Controllers\Backend\HouseRoomController;
use App\Http\Controllers\Backend\FoodBeverageController;
use App\Http\Controllers\Backend\EventServiceController;
use App\Http\Controllers\Backend\BusinessCenterController;
use App\Http\Controllers\Backend\ExternalServiceController;
use App\Http\Controllers\Backend\LaundryController;
use App\Http\Controllers\Backend\DryCleaningController;
use App\Http\Controllers\Backend\PressingController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\OwnerSpecialController;
use App\Http\Controllers\Backend\HomeContentController;
use App\Http\Controllers\Backend\AirportContentController;
use App\Http\Controllers\Backend\HowWorkController;
use App\Http\Controllers\Backend\FooterContentController;
use App\Http\Controllers\Backend\FooterCommunityController;
use App\Http\Controllers\Backend\FooterSupportController;



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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth/google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth/google/callback');


Route::get('auth/facebook', [GoogleController::class, 'redirectToFacebook'])->name('auth/facebook');
Route::get('auth/facebook/callback', [GoogleController::class, 'handleFacebookCallback'])->name('auth/facebook/callback');


Route::middleware(['LoginCheck'])->group(function(){
    Route::get('admin-login', [AdminController::class, 'login'])->name('admin-login');
});
Route::post('save-admin-login', [AdminController::class, 'save_login'])->name('save-admin-login');

//signup user 
Route::middleware(['CustomerLogin'])->group(function(){
    Route::get('signup', [CustomerController::class, 'signup'])->name('signup');
    Route::get('customer-login', [CustomerController::class, 'login'])->name('customer-login');
    Route::get('customer-login2', [CustomerController::class, 'login2'])->name('customer-login2');
});

Route::middleware(['CustomerAuth'])->group(function(){
    Route::get('add-to-cart/{id}/{check_id}/{check_out}/{adult}/{child}/{infant}', [ReservationController::class, 'add_to_cart'])->name('add-to-cart');
    Route::get('add-to-cart-2/{id}', [ReservationController::class, 'add_to_cart_2'])->name('add-to-cart-2');
    Route::post('check-out/{id}', [ReservationController::class, 'check_out'])->name('check-out');
    Route::post('check-out2/{id}', [ReservationController::class, 'check_out2'])->name('check-out2');
    Route::get('success', [ReservationController::class, 'success'])->name('success');

    //service checkout
    Route::get('service-check-out', [ServiceCenterController::class, 'service_checkout'])->name('service-check-out');
    Route::get('place-service-request', [ServiceCenterController::class, 'place_service_request'])->name('place-service-request');

    //airport-pick-up-drop
    Route::post('airport-pick-up-drop', [ServiceCenterController::class, 'airport_pick_up_drop'])->name('airport-pick-up-drop');
    Route::post('car-rental', [ServiceCenterController::class, 'car_rental'])->name('car-rental');
    Route::post('bicycle -rental', [ServiceCenterController::class, 'bicycle_rental'])->name('bicycle-rental');
});

Route::post('save-customer-login', [CustomerController::class, 'save'])->name('save-customer-login');
Route::post('save-user', [CustomerController::class, 'save_signup'])->name('save-user');
Route::get('customer-logout', [CustomerController::class, 'logout'])->name('customer-logout');

Route::post('contact-mail', [ServiceCenterController::class, 'contact_mail'])->name('contact-mail');

//search-for-reservation
Route::get('search-for-reservation', [ReservationController::class, 'search_for_reservation'])->name('search-for-reservation');
Route::get('reservation', [ReservationController::class, 'reservation'])->name('reservation');
Route::get('service-center', [ServiceCenterController::class, 'index'])->name('service-center');
Route::post('add-cart-concierge-service', [ServiceCenterController::class, 'concierge_service'])->name('add-cart-concierge-service');
Route::get('about-us', [ServiceCenterController::class, 'about_us'])->name('about-us');
Route::get('contact-us', [ServiceCenterController::class, 'contact_us'])->name('contact-us');
Route::get('about-content-by-id/{id}', [ServiceCenterController::class, 'about_content_by_id'])->name('about-content-by-id');
Route::get('community-content-by-id/{id}', [ServiceCenterController::class, 'community_content_by_id'])->name('community-content-by-id');
Route::get('support-content-by-id/{id}', [ServiceCenterController::class, 'support_content_by_id'])->name('support-content-by-id');


Route::middleware(['DashboardCheck'])->prefix('dashboard')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('admin-logout', [AdminController::class, 'logout'])->name('admin-logout');

    //room route are goes here
    Route::get('add-room', [RoomController::class, 'index'])->name('add-room');
    Route::post('save-room', [RoomController::class, 'save'])->name('save-room');
    Route::get('room-list', [RoomController::class, 'show'])->name('room-list');
    Route::get('edit-room/{id}', [RoomController::class, 'edit'])->name('edit-room');
    Route::post('update-room/{id}', [RoomController::class, 'update'])->name('update-room');
    Route::get('delete-room/{id}', [RoomController::class, 'delete'])->name('delete-room');
    Route::get('inactive-room/{id}', [RoomController::class, 'inactive'])->name('inactive-room');
    Route::get('active-room/{id}', [RoomController::class, 'active'])->name('active-room');
    
    Route::get('room-content', [RoomController::class, 'room_content'])->name('room-content');
    Route::post('update-room-content', [RoomController::class, 'update_room_content'])->name('update-room-content');

    //ConciergeService
    Route::get('add-concierge-service', [ConciergeServiceController::class, 'index'])->name('add-concierge-service');
    Route::post('save-concierge-service', [ConciergeServiceController::class, 'save'])->name('save-concierge-service');
    Route::get('all-concierge-service', [ConciergeServiceController::class, 'show'])->name('all-concierge-service');
    Route::get('edit-concierge-service/{id}', [ConciergeServiceController::class, 'edit'])->name('edit-concierge-service');
    Route::post('update-concierge-service/{id}', [ConciergeServiceController::class, 'update'])->name('update-concierge-service');
    Route::get('delete-concierge-service/{id}', [ConciergeServiceController::class, 'delete'])->name('delete-concierge-service');//ConciergeService
    
    //HouseRoomController
    Route::get('add-house-room-service', [HouseRoomController::class, 'index'])->name('add-house-room-service');
    Route::post('save-house-room-service', [HouseRoomController::class, 'save'])->name('save-house-room-service');
    Route::get('all-house-room-service', [HouseRoomController::class, 'show'])->name('all-house-room-service');
    Route::get('edit-house-room-service/{id}', [HouseRoomController::class, 'edit'])->name('edit-house-room-service');
    Route::post('update-house-room-service/{id}', [HouseRoomController::class, 'update'])->name('update-house-room-service');
    Route::get('delete-house-room-service/{id}', [HouseRoomController::class, 'delete'])->name('delete-house-room-service');
    
    //HouseRoomController
    Route::get('add-food-beverage-service', [FoodBeverageController::class, 'index'])->name('add-food-beverage-service');
    Route::post('save-food-beverage-service', [FoodBeverageController::class, 'save'])->name('save-food-beverage-service');
    Route::get('all-food-beverage-service', [FoodBeverageController::class, 'show'])->name('all-food-beverage-service');
    Route::get('edit-food-beverage-service/{id}', [FoodBeverageController::class, 'edit'])->name('edit-food-beverage-service');
    Route::post('update-food-beverage-service/{id}', [FoodBeverageController::class, 'update'])->name('update-food-beverage-service');
    Route::get('delete-food-beverage-service/{id}', [FoodBeverageController::class, 'delete'])->name('delete-food-beverage-service');

    //EventServiceController
    Route::get('add-event-service', [EventServiceController::class, 'index'])->name('add-event-service');
    Route::post('save-event-service', [EventServiceController::class, 'save'])->name('save-event-service');
    Route::get('all-event-service', [EventServiceController::class, 'show'])->name('all-event-service');
    Route::get('edit-event-service/{id}', [EventServiceController::class, 'edit'])->name('edit-event-service');
    Route::post('update-event-service/{id}', [EventServiceController::class, 'update'])->name('update-event-service');
    Route::get('delete-event-service/{id}', [EventServiceController::class, 'delete'])->name('delete-event-service');
    
    //BusinessCenterController
    Route::get('add-busines-center-service', [BusinessCenterController::class, 'index'])->name('add-busines-center-service');
    Route::post('save-busines-center-service', [BusinessCenterController::class, 'save'])->name('save-busines-center-service');
    Route::get('all-busines-center-service', [BusinessCenterController::class, 'show'])->name('all-busines-center-service');
    Route::get('edit-busines-center-service/{id}', [BusinessCenterController::class, 'edit'])->name('edit-busines-center-service');
    Route::post('update-busines-center-service/{id}', [BusinessCenterController::class, 'update'])->name('update-busines-center-service');
    Route::get('delete-busines-center-service/{id}', [BusinessCenterController::class, 'delete'])->name('delete-busines-center-service');

    //ExternalServiceController
    Route::get('add-external-service', [ExternalServiceController::class, 'index'])->name('add-external-service');
    Route::post('save-external-service', [ExternalServiceController::class, 'save'])->name('save-external-service');
    Route::get('all-external-service', [ExternalServiceController::class, 'show'])->name('all-external-service');
    Route::get('edit-external-service/{id}', [ExternalServiceController::class, 'edit'])->name('edit-external-service');
    Route::post('update-external-service/{id}', [ExternalServiceController::class, 'update'])->name('update-external-service');
    Route::get('delete-external-service/{id}', [ExternalServiceController::class, 'delete'])->name('delete-external-service');

    //LaundryController
    Route::get('add-laundry-service', [LaundryController::class, 'index'])->name('add-laundry-service');
    Route::post('save-laundry-service', [LaundryController::class, 'save'])->name('save-laundry-service');
    Route::get('all-laundry-service', [LaundryController::class, 'show'])->name('all-laundry-service');
    Route::get('edit-laundry-service/{id}', [LaundryController::class, 'edit'])->name('edit-laundry-service');
    Route::post('update-laundry-service/{id}', [LaundryController::class, 'update'])->name('update-laundry-service');
    Route::get('delete-laundry-service/{id}', [LaundryController::class, 'delete'])->name('delete-laundry-service');

    //DryCleaningController
    Route::get('add-dry-cleaning-service', [DryCleaningController::class, 'index'])->name('add-dry-cleaning-service');
    Route::post('save-dry-cleaning-service', [DryCleaningController::class, 'save'])->name('save-dry-cleaning-service');
    Route::get('all-dry-cleaning-service', [DryCleaningController::class, 'show'])->name('all-dry-cleaning-service');
    Route::get('edit-dry-cleaning-service/{id}', [DryCleaningController::class, 'edit'])->name('edit-dry-cleaning-service');
    Route::post('update-dry-cleaning-service/{id}', [DryCleaningController::class, 'update'])->name('update-dry-cleaning-service');
    Route::get('delete-dry-cleaning-service/{id}', [DryCleaningController::class, 'delete'])->name('delete-dry-cleaning-service');

    //PressingController
    Route::get('add-pressing-service', [PressingController::class, 'index'])->name('add-pressing-service');
    Route::post('save-pressing-service', [PressingController::class, 'save'])->name('save-pressing-service');
    Route::get('all-pressing-service', [PressingController::class, 'show'])->name('all-pressing-service');
    Route::get('edit-pressing-service/{id}', [PressingController::class, 'edit'])->name('edit-pressing-service');
    Route::post('update-pressing-service/{id}', [PressingController::class, 'update'])->name('update-pressing-service');
    Route::get('delete-pressing-service/{id}', [PressingController::class, 'delete'])->name('delete-pressing-service');
    
    //FaqController
    Route::get('add-faq', [FaqController::class, 'index'])->name('add-faq');
    Route::post('save-faq', [FaqController::class, 'save'])->name('save-faq');
    Route::get('all-faq', [FaqController::class, 'show'])->name('all-faq');
    Route::get('edit-faq/{id}', [FaqController::class, 'edit'])->name('edit-faq');
    Route::post('update-faq/{id}', [FaqController::class, 'update'])->name('update-faq');
    Route::get('delete-faq/{id}', [FaqController::class, 'delete'])->name('delete-faq');
    
    //FaqController
    Route::get('add-owner-special', [OwnerSpecialController::class, 'index'])->name('add-owner-special');
    Route::post('save-owner-special', [OwnerSpecialController::class, 'save'])->name('save-owner-special');
    Route::get('all-owner-special', [OwnerSpecialController::class, 'show'])->name('all-owner-special');
    Route::get('edit-owner-special/{id}', [OwnerSpecialController::class, 'edit'])->name('edit-owner-special');
    Route::post('update-owner-special/{id}', [OwnerSpecialController::class, 'update'])->name('update-owner-special');
    Route::get('delete-owner-special/{id}', [OwnerSpecialController::class, 'delete'])->name('delete-owner-special');
    
    //FaqController
    Route::get('add-service-center', [HomeContentController::class, 'index'])->name('add-service-center');
    Route::post('save-service-center', [HomeContentController::class, 'save'])->name('save-service-center');
    Route::get('service-center-list', [HomeContentController::class, 'show'])->name('service-center-list');
    Route::get('edit-service-center/{id}', [HomeContentController::class, 'edit'])->name('edit-service-center');
    Route::post('update-service-center/{id}', [HomeContentController::class, 'update'])->name('update-service-center');
    Route::get('delete-service-center/{id}', [HomeContentController::class, 'delete'])->name('delete-service-center');
    
    Route::get('setting', [HomeContentController::class, 'setting'])->name('setting');
    Route::post('update-setting', [HomeContentController::class, 'update_setting'])->name('update-setting');
    Route::get('change-password', [HomeContentController::class, 'change_password'])->name('change-password');
    Route::post('update-password', [HomeContentController::class, 'update_password'])->name('update-password');
    Route::get('menu', [HomeContentController::class, 'menu'])->name('menu');
    Route::post('update-menu', [HomeContentController::class, 'update_menu'])->name('update-menu');
    Route::get('b-contact', [HomeContentController::class, 'b_contact'])->name('b-contact');
    Route::post('update-contact', [HomeContentController::class, 'update_contact'])->name('update-contact');
    Route::get('about', [HomeContentController::class, 'about'])->name('about');
    Route::post('about', [HomeContentController::class, 'update_about_us'])->name('update-about-us');
    
    Route::get('airport-content', [AirportContentController::class, 'index'])->name('airport-content');
    Route::post('update-airport-content', [AirportContentController::class, 'update'])->name('update-airport-content');

    Route::get('car-rental-content', [AirportContentController::class, 'car_rental_content'])->name('car-rental-content');
    Route::post('update-car-rental-content', [AirportContentController::class, 'update_rental_content'])->name('update-car-rental-content');

    Route::get('by-cycle-content', [AirportContentController::class, 'bycycle_rental_content'])->name('car-by-cycle-content');
    Route::post('update-by-cycle-content', [AirportContentController::class, 'update_bycycle_rental_content'])->name('update-by-cycle-content');
    
    Route::get('add-how-it-work', [HowWorkController::class, 'index'])->name('add-how-it-work');
    Route::post('save-how-work', [HowWorkController::class, 'save'])->name('save-how-work');
    Route::get('how-it-work-list', [HowWorkController::class, 'show'])->name('how-it-work-list');
    Route::get('edit-how-it-work/{id}', [HowWorkController::class, 'edit'])->name('edit-how-it-work');
    Route::post('update-how-it-work/{id}', [HowWorkController::class, 'update'])->name('update-how-it-work');
    Route::get('delete-how-it-work/{id}', [HowWorkController::class, 'delete'])->name('delete-how-it-work');

    //footer about content
    Route::get('footer-about-content', [FooterContentController::class, 'index'])->name('footer-about-content');
    Route::post('save-footer-about-content', [FooterContentController::class, 'save'])->name('save-footer-about-content');
    Route::get('footer-about-content-list', [FooterContentController::class, 'show'])->name('footer-about-content-list');
    Route::get('edit-footer-about-content/{id}', [FooterContentController::class, 'edit'])->name('edit-footer-about-content');
    Route::post('update-footer-about-content/{id}', [FooterContentController::class, 'update'])->name('update-footer-about-content');
    Route::get('delete-footer-about-content/{id}', [FooterContentController::class, 'delete'])->name('delete-footer-about-content');
    
    //footer about content
    Route::get('footer-community-content', [FooterCommunityController::class, 'index'])->name('footer-community-content');
    Route::post('save-footer-community-content', [FooterCommunityController::class, 'save'])->name('save-footer-community-content');
    Route::get('footer-community-content-list', [FooterCommunityController::class, 'show'])->name('footer-community-content-list');
    Route::get('edit-footer-community-content/{id}', [FooterCommunityController::class, 'edit'])->name('edit-footer-community-content');
    Route::post('update-footer-community-content/{id}', [FooterCommunityController::class, 'update'])->name('update-footer-community-content');
    Route::get('delete-footer-community-content/{id}', [FooterCommunityController::class, 'delete'])->name('delete-footer-community-content');
    
    //footer about content
    Route::get('footer-support-content', [FooterSupportController::class, 'index'])->name('footer-support-content');
    Route::post('save-footer-support-content', [FooterSupportController::class, 'save'])->name('save-footer-support-content');
    Route::get('footer-support-content-list', [FooterSupportController::class, 'show'])->name('footer-support-content-list');
    Route::get('edit-footer-support-content/{id}', [FooterSupportController::class, 'edit'])->name('edit-footer-support-content');
    Route::post('update-footer-support-content/{id}', [FooterSupportController::class, 'update'])->name('update-footer-support-content');
    Route::get('delete-footer-support-content/{id}', [FooterSupportController::class, 'delete'])->name('delete-footer-support-content');
});


