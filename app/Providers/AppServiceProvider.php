<?php

namespace App\Providers;

use App\Models\DanhMuc;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $danhMuc = DanhMuc::where('is_open', 1)->orderBy('ten_danh_muc')->get();
        $topDanhMuc = DanhMuc::where('is_open', 1)->where('id_danh_muc_cha', 0)->orderBy('ten_danh_muc')->take(3)->get();
        $top5DanhMuc = DanhMuc::where('is_open', 1)->where('id_danh_muc_cha', 0)->orderBy('ten_danh_muc')->take(4)->get();
        view()->share('danhMuc', $danhMuc);
        view()->share('topDanhMuc', $topDanhMuc);
        view()->share('top5DanhMuc', $top5DanhMuc);

        // dd($danhMuc->toArray());
    }
}
