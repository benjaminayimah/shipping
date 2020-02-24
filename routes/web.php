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


Route::get('/dashboard', [
    'uses' => 'usersController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'admin'
]);
Route::get('dashboard/shipments', [
    'uses' => 'shipmentController@getShipments',
    'as' => 'get.shipments',
    'middleware' => 'admin'
]);
Route::get('dashboard/shipments/add-shipment', [
    'uses' => 'shipmentController@getAddShipment',
    'as' => 'get.addShipment',
    'middleware' => 'admin'
]);
Route::get('dashboard/shipment/{id}', [
    'uses' => 'shipmentController@getEditShipment',
    'as' => 'get.editshipment',
    'middleware' => 'admin'
]);
Route::get('dashboard/shipment-details/{id}', [
    'uses' => 'shipmentController@getShipmentDetails',
    'as' => 'get.viewDetails',
    'middleware' => 'admin'
]);
Route::get('dashboard/shipments/draft', [
    'uses' => 'shipmentController@getDraft',
    'as' => 'get.draft',
    'middleware' => 'admin'
]);
Route::post('/admin-post-del-ship', [
    'uses' => 'shipmentController@posDelshipment',
    'as' => 'post.del.shipment',
    'middleware' => 'admin'
]);
Route::post('/admin-post-option', [
    'uses' => 'shipmentController@postOption',
    'as' => 'post.option',
    'middleware' => 'admin'
]);
Route::post('/admin-post-del-opt', [
    'uses' => 'shipmentController@postDelOpt',
    'as' => 'post.del.opt',
    'middleware' => 'admin'
]);
Route::post('/admin-post-edit-opt', [
    'uses' => 'shipmentController@postEditOpt',
    'as' => 'post.edit.opt',
    'middleware' => 'admin'
]);
Route::post('/admin-post-shipment', [
    'uses' => 'shipmentController@postShipment',
    'as' => 'post.shipment',
    'middleware' => 'admin'
]);
Route::post('/admin-post-shipmentEdit', [
    'uses' => 'shipmentController@postShipmentEdit',
    'as' => 'post.shipmentEdit',
    'middleware' => 'admin'
]);
Route::get('dashboard/messages/feedback', [
    'uses' => 'messageController@getFeedback',
    'as' => 'get.feedback',
    'middleware' => 'admin'
]);
Route::post('/admin-del-feed', [
    'uses' => 'messageController@postDelFeedback',
    'as' => 'post.del.feedback',
    'middleware' => 'admin'
]);
Route::post('/admin-del-quote', [
    'uses' => 'messageController@postDelQuote',
    'as' => 'post.del.quote',
    'middleware' => 'admin'
]);
Route::get('dashboard/messages/quote', [
    'uses' => 'messageController@getAdminQuote',
    'as' => 'get.adminQuote',
    'middleware' => 'admin'
]);
Route::get('dashboard/airway-bill', [
    'uses' => 'shipmentController@getAdminAirwaybill',
    'as' => 'get.adminAwb',
    'middleware' => 'admin'
]);
Route::post('/admin-post-awl', [
    'uses' => 'shipmentController@postAdminAWB',
    'as' => 'post.admin.awb',
    'middleware' => 'admin'
]);
Route::get('dashboard/gallery', [
    'uses' => 'dashboardController@getAdminGallery',
    'as' => 'get.adminGallery',
    'middleware' => 'admin'
]);
Route::get('dashboard/banner', [
    'uses' => 'dashboardController@getAdminBanner',
    'as' => 'get.adminBanner',
    'middleware' => 'admin'
]);

Route::post('/admin-post-gallery', [
    'uses' => 'dashboardController@postAdminGallery',
    'as' => 'post.admin.gallery',
    'middleware' => 'admin'
]);
Route::get('/image/{filename}', [
    'uses' => 'dashboardController@getGalleryimg',
    'as' => 'get.image',
    'middleware' => 'admin'
]);
Route::post('/admin-post-del-gal', [
    'uses' => 'dashboardController@postDelGallery',
    'as' => 'post.del.gallery',
    'middleware' => 'admin'
]);
Route::post('/admin-post-edit-gal', [
    'uses' => 'dashboardController@postEditedGal',
    'as' => 'post.edit.gallery',
    'middleware' => 'admin'
]);
Route::post('/admin-post-galstatus', [
    'uses' => 'dashboardController@postGalStatus',
    'as' => 'post.gall.status',
    'middleware' => 'admin'
]);
Route::post('/admin-post-bannerstatus', [
    'uses' => 'dashboardController@postBannerStatus',
    'as' => 'post.banner.status',
    'middleware' => 'admin'
]);
Route::get('/dashboard/user-account/home', [
    'uses' => 'dashboardController@getUserAccountHome',
    'as' => 'get.user.account',
    'middleware' => 'admin'
]);
Route::get('/dashboard/user-account/edit-details', [
    'uses' => 'dashboardController@getUserAccountEditdetails',
    'as' => 'get.userAccount.editDetails',
    'middleware' => 'admin'
]);
Route::get('/dashboard/user-account/update-password', [
    'uses' => 'dashboardController@getUserAccountUpdatepass',
    'as' => 'get.userAccount.updatepass',
    'middleware' => 'admin'
]);
Route::post('/admin-post-editacc', [
    'uses' => 'dashboardController@postEditUserAcct',
    'as' => 'post.edit.acct',
    'middleware' => 'admin'
]);
Route::post('/admin-post-userpass', [
    'uses' => 'dashboardController@postEditUserPass',
    'as' => 'post.edit.userPass',
    'middleware' => 'admin'
]);
Route::post('/post.changepassword', [
    'uses' => 'dashboardController@postEditUserPass',
    'as' => 'post.changepass',
    'middleware' => 'admin'
]);
Route::get('/dashboard/homepage-setup/section1', [
    'uses' => 'dashboardController@getHomepageSetupSec1',
    'as' => 'get.homepage.section1',
    'middleware' => 'admin'
]);
Route::get('/dashboard/homepage-setup/section2', [
    'uses' => 'dashboardController@getHomepageSetupSec2',
    'as' => 'get.homepage.section2',
    'middleware' => 'admin'
]);
Route::get('/dashboard/homepage-setup/section3', [
    'uses' => 'dashboardController@getHomepageSetupSec3',
    'as' => 'get.homepage.section3',
    'middleware' => 'admin'
]);
Route::get('/dashboard/homepage-setup/section-footer', [
    'uses' => 'dashboardController@getHomepageSetupSecFooter',
    'as' => 'get.homepage.sectionFooter',
    'middleware' => 'admin'
]);
Route::get('/dashboard/users', [
    'uses' => 'dashboardController@getUserManagement',
    'as' => 'get.userManagement',
    'middleware' => 'admin'
]);
Route::get('/dashboard/user/create', [
    'uses' => 'dashboardController@getUserCreate',
    'as' => 'get.userCreate',
    'middleware' => 'admin'
]);
Route::get('dashboard/user/{id}/edit', [
    'uses' => 'dashboardController@getEditUser',
    'as' => 'get.edituser',
    'middleware' => 'can_edit'
]);
Route::post('/post.del-user', [
    'uses' => 'usersController@postDelUser',
    'as' => 'post.deluser',
    'middleware' => 'can_edit'
]);
Route::post('/post.del-newsletter', [
    'uses' => 'dashboardController@postDelNewsletter',
    'as' => 'post.delnewsletter',
    'middleware' => 'can_edit'
]);
Route::post('/post.sections', [
    'uses' => 'dashboardController@postSections',
    'as' => 'post.sections',
    'middleware' => 'admin'
]);
Route::post('/post.update-section-head', [
    'uses' => 'dashboardController@postSectionsHead',
    'as' => 'post.sectionsHead',
    'middleware' => 'admin'
]);
Route::post('/post-del-hm-sec', [
    'uses' => 'dashboardController@postDelHmSection',
    'as' => 'post.del.hm-sec',
    'middleware' => 'admin'
]);
Route::get('dashboard/newsletter', [
    'uses' => 'dashboardController@getNewsletter',
    'as' => 'get.newsletter',
    'middleware' => 'admin'
]);








Route::get('/', [
    'uses' => 'homeController@getHome',
    'as' => 'welcome'
]);
Route::get('/login', [
    'uses' => 'usersController@getLoginpage',
    'as' => 'get.login',
]);
Route::post('/register-user', [
    'uses' => 'usersController@postRegisterUser',
    'as' => 'create.user'
]);
Route::post('/login-user', [
    'uses' => 'usersController@loginUser',
    'as' => 'post.login'
]);
Route::post('/logout-user', [
    'uses' => 'usersController@postLogout',
    'as' => 'logout'
]);
Route::post('/post/newsletter', [
    'uses' => 'messageController@postNewsletter',
    'as' => 'post.newsletter'
]);
Route::post('/post/feedback', [
    'uses' => 'messageController@postFeedback',
    'as' => 'post.feedback'
]);
Route::get('/quote', [
    'uses' => 'homeController@getQuote',
    'as' => 'get.quote',
]);

Route::get('/terms', [
    'uses' => 'homeController@getTerms',
    'as' => 'get.terms',
]);
Route::get('/privacy-policy', [
    'uses' => 'homeController@getPrivacyPolicy',
    'as' => 'get.privacy',
]);
Route::get('/help', [
    'uses' => 'homeController@getHelp',
    'as' => 'get.help',
]);
Route::get('/track-your-shipment', [
    'uses' => 'homeController@getTracking',
    'as' => 'get.tracking',
]);
Route::post('/post/quote', [
    'uses' => 'shipmentController@postQuote',
    'as' => 'post.quote'
]);
Route::get('/gallery', [
    'uses' => 'homeController@getGallery',
    'as' => 'get.gallery',
]);
Route::post('/track-your-shipment', [
    'uses' => 'homeController@postTracker',
    'as' => 'post.tracker'
]);
Route::get('/shipment-tracker', [
    'uses' => 'homeController@getTrackerdetails',
    'as' => 'get.tracker',
]);
Route::get('/services', [
    'uses' => 'homeController@getServices',
    'as' => 'get.services',
]);

