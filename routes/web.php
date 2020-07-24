<?php

use Illuminate\Support\Facades\Route;

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

/** PUBLIC **/
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('citra-satelit', 'HomeController@citra_satelit')->name('citra-satelit');
Route::get('perkiraan-tinggi-gelombang', 'HomeController@ptinggi_gelombang')->name('ptinggi-gelombang');
Route::get('permintaan-data', 'HomeController@permintaan_data')->name('permintaan-data');
Route::get('cuaca-aktual-bandara', 'HomeController@cuaca_aktual_bandara')->name('cuaca-aktual-bandara');
Route::get('prakiraan-cuaca-bandara/{id?}', 'HomeController@pcuaca_bandara')->name('pcuaca-bandara');
Route::get('sigwx', 'HomeController@sigwx')->name('sigwx');
Route::get('gallery', 'HomeController@gallery')->name('gallery');
Route::get('gallery/{id}', 'HomeController@gallery_detail');
Route::get('gallery/{id}/image/{imgid}', 'HomeController@image_detail');
/**
 * PRIVATE
 */
Route::get(config('app.root').'/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource(
	config('app.root').'/users', 'UsersController', [
	'names' => [
		'index'  => 'users',
		'create' => 'users.add',
		'store'  => 'users.store'
	]
]);
/** PERINGATAN DINI CUACA EKSTRIM **/
Route::resource(config('app.root').'/pdce', 'PdceController', [
	'names' => [
		'index'  => 'pdce',
		'create' => 'pdce.add',
		'store'  => 'pdce.store'
	]
]);
/** VULCANIC ASH ACTIVITIES REPORT **/
Route::resource(config('app.root').'/veaer', 'VeaerController', [
	'names' => [
		'index'  => 'veaer',
		'create' => 'veaer.add',
		'store'  => 'veaer.store'
	]
]);
/** FLIGHT DOCUMENT **/
Route::resource(config('app.root').'/flightdoc', 'FlightDocController', [
	'names' => [
		'index'  => 'flightdoc',
		'create' => 'flightdoc.add',
		'store'  => 'flightdoc.store'
	]
]);
/** AERODROME dan WIND SHEAR WARNING **/
Route::resource(config('app.root').'/aerodrom', 'AwswController', [
	'names' => [
		'index'  => 'aerodrom',
		'create' => 'aerodrom.add',
		'store'  => 'aerodrom.store'
	]
]);
/** PRAKIRAAN CUACA WILAYAH PELAYARAN **/
Route::resource(config('app.root').'/pcwp', 'PcwpController', [
	'names' => [
		'index'  => 'pcwp',
		'create' => 'pcwp.add',
		'store'  => 'pcwp.store'
	]
]);
/** PRAKIRAAN CUACA PELABUHAN **/
Route::resource('pcp', 'PcpController');
Route::resource(config('app.root').'/pcp', 'PcpController', [
	'names' => [
		'index'  => 'pcp',
		'create' => 'pcp.add',
		'store'  => 'pcp.store'
	]
]);
/** PERINGATAN DINI GELOMBANG TINGGI **/
Route::resource(config('app.root').'/pdgt', 'PdgtController', [
	'names' => [
		'index'  => 'pdgt',
		'create' => 'pdgt.add',
		'store'  => 'pdgt.store'
	]
]);
/** BULETIN **/
Route::resource(config('app.root').'/buletin', 'BuletinController', [
	'names' => [
		'index'  => 'buletin',
		'create' => 'buletin.add',
		'store'  => 'buletin.store'
	]
]);
/** INFOGRAFIS **/
Route::resource(config('app.root').'/infografis', 'InfografisController', [
	'names' => [
		'index'  => 'infografis',
		'create' => 'infografis.add',
		'store'  => 'infografis.store'
	]
]);
/** FLYER **/
Route::resource(config('app.root').'/flyer', 'FlyerController', [
	'names' => [
		'index'  => 'flyer',
		'create' => 'flyer.add',
		'store'  => 'flyer.store'
	]
]);
/** PAHB **/
Route::resource(config('app.root').'/pahb', 'PahbController', [
	'names' => [
		'index'  => 'pahb',
		'create' => 'pahb.add',
		'store'  => 'pahb.store'
	]
]);
/** PM **/
Route::resource(config('app.root').'/pm', 'PmController', [
	'names' => [
		'index'  => 'pm',
		'create' => 'pm.add',
		'store'  => 'pm.store'
	]
]);
/** IHTH **/
Route::resource(config('app.root').'/ihth', 'IhthController', [
	'names' => [
		'index'  => 'ihth',
		'create' => 'ihth.add',
		'store'  => 'ihth.store'
	]
]);
/** IPT **/
Route::resource(config('app.root').'/ipt', 'IptController', [
	'names' => [
		'index'  => 'ipt',
		'create' => 'ipt.add',
		'store'  => 'ipt.store'
	]
]);
/** KALEI **/
Route::resource(config('app.root').'/kalei', 'KaleiController', [
	'names' => [
		'index'  => 'kalei',
		'create' => 'kalei.add',
		'store'  => 'kalei.store'
	]
]);
/** GALLERY **/
Route::get(config('app.root').'/album/{id}/gallery', 'GalleryController@index');
Route::get(config('app.root').'/album/{id}/gallery/create', 'GalleryController@create');
Route::post(config('app.root').'/album/{id}/gallery', 'GalleryController@store');
Route::delete(config('app.root').'/album/{id}/gallery/{gid}', 'GalleryController@destroy');
Route::post(config('app.root').'/album/{id}/gallery/view', 'GalleryController@view');
Route::resource(config('app.root').'/album', 'AlbumController', [
	'names' => [
		'index'  => 'album',
		'create' => 'album.add',
		'store'  => 'album.store'
	]
]);
/** ARTICLE **/
Route::resource(config('app.root').'/articles', 'ArticlesController', [
	'names' => [
		'index'  => 'articles',
		'create' => 'articles.add',
		'store'  => 'articles.store'
	]
]);
