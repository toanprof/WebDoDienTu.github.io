<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index']);
Route::get('/xxx', [\App\Http\Controllers\TestController::class, 'postIndex']);
// Route::get('/demo', [\App\Http\Controllers\TestController::class, 'demo']);

Route::get('/transaction', [\App\Http\Controllers\TransactionController::class, 'index']);

Route::get('/login', [\App\Http\Controllers\CustommerController::class, 'viewAuth']);
Route::post('/register', [\App\Http\Controllers\CustommerController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\CustommerController::class, 'login']);
Route::get('/kich-hoat/{hash}', [\App\Http\Controllers\CustommerController::class, 'active']);
Route::get('/logout', [\App\Http\Controllers\CustommerController::class, 'logout']);
Route::get('/reset', [\App\Http\Controllers\CustommerController::class, 'viewReset']);
Route::post('/reset', [\App\Http\Controllers\CustommerController::class, 'actionReset']);

Route::get('/change-pass/{hash}', [\App\Http\Controllers\CustommerController::class, 'viewChangePass']);
Route::post('/change-pass', [\App\Http\Controllers\CustommerController::class, 'actionChangePass']);

Route::get('/home', [\App\Http\Controllers\TestController::class, 'viewHome']);

Route::get('/product/{id}', [\App\Http\Controllers\HomepageController::class, 'detailProduct']);
Route::get('/category/{id}', [\App\Http\Controllers\HomepageController::class, 'listProduct']);

Route::group(['prefix' => '/client', 'middleware' => 'ClientMiddleware'], function () {
    Route::get('/add-to-cart/{id_san_pham}', [\App\Http\Controllers\ChiTietDonHangController::class, 'store']);
    Route::get('/cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
    Route::get('/cart/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
    Route::get('/cart/remove/{id}', [\App\Http\Controllers\ChiTietDonHangController::class, 'removeCart']);
    Route::post('/cart/update', [\App\Http\Controllers\ChiTietDonHangController::class, 'update']);

    Route::post('/bill/create', [\App\Http\Controllers\BillController::class, 'store']);
    Route::get('/bill-order', [\App\Http\Controllers\BillController::class, 'index']);
    Route::get('/bill/order', [\App\Http\Controllers\BillController::class, 'listOrder']);
    Route::get('/all-bill', [\App\Http\Controllers\BillController::class, 'listBill']);
});

Route::group(['prefix' => '/admin', 'middleware' => 'AdminMiddleware'], function () {
    Route::group(['prefix' => '/thong-bao'], function () {
        Route::get('/index', [\App\Http\Controllers\NotiController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\NotiController::class, 'active']);
    });

    Route::group(['prefix' => '/danh-muc'], function () {
        Route::get('/index', [\App\Http\Controllers\DanhMucController::class, 'index']);

        Route::get('/get-data', [\App\Http\Controllers\DanhMucController::class, 'getData']);
        Route::get('/update-status/{id}',  [\App\Http\Controllers\DanhMucController::class, 'updateStatus']);

        Route::post('/index', [\App\Http\Controllers\DanhMucController::class, 'store']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\DanhMucController::class, 'destroy']);
    });

    Route::group(['prefix' => '/san-pham'], function () {
        Route::post('/search', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'search']);
        Route::get('/index', [\App\Http\Controllers\SanPhamController::class, 'index']);

        Route::get('/data', [\App\Http\Controllers\SanPhamController::class, 'getData']);
        Route::post('/index', [\App\Http\Controllers\SanPhamController::class, 'store']);
        Route::post('/check-product-id', [\App\Http\Controllers\SanPhamController::class, 'checkProuctId']);

        Route::get('/auto-complete', [\App\Http\Controllers\SanPhamController::class, 'autoComplete']);
    });
    Route::group(['prefix' => '/nhap-kho'], function () {
        Route::get('/index', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'index']);

        Route::get('/data', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'getData']);

        Route::post('/create', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'store']);
        Route::post('/delete', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'destroy']);
        Route::post('/update', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'update']);
        Route::post('/updatePrice', [\App\Http\Controllers\ChiTietNhapKhoController::class, 'updatePrice']);

        Route::get('/lich-su', [\App\Http\Controllers\HoaDonNhapKhoController::class, 'history']);
    });
    Route::group(['prefix' => '/hoa-don-nhap-kho'], function () {
        Route::get('/create', [\App\Http\Controllers\HoaDonNhapKhoController::class, 'store']);

        Route::get('/detail/{id_hoa_don}', [\App\Http\Controllers\HoaDonNhapKhoController::class, 'detail']);
        Route::get('/thong-ke', [\App\Http\Controllers\HoaDonNhapKhoController::class, 'analytic']);
        Route::post('/thong-ke', [\App\Http\Controllers\HoaDonNhapKhoController::class, 'analyticPost'])->name('postThongKeNhapKho');
    });
    Route::group(['prefix' => '/account'], function () {
        Route::get('/index', [\App\Http\Controllers\AdminController::class, 'index']);

        Route::get('/data', [\App\Http\Controllers\AdminController::class, 'getData']);
        Route::post('/check-email', [\App\Http\Controllers\AdminController::class, 'checkEmail']);
        Route::post('/index', [\App\Http\Controllers\AdminController::class, 'store']);

        Route::get('/edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit']);

        Route::post('/update', [\App\Http\Controllers\AdminController::class, 'update']);
    });

    Route::group(['prefix' => '/hoa-don-ban-hang'], function () {
        Route::get('/index', [\App\Http\Controllers\BillController::class, 'admin_index']);

        Route::get('/data', [\App\Http\Controllers\BillController::class, 'getData']);
        Route::get('/detail/{id}', [\App\Http\Controllers\ChiTietDonHangController::class, 'getDetail']);
    });

    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
});

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'actionLogin']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'AdminMiddleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
