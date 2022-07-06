@extends('client_new.master')

@section('main_title')
    {{$danhMucCha->ten_danh_muc}}
@endsection

@section('sub_title')
    Danh sách sản phẩm
@endsection

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">

            <!-- Product sidebar -->

            <!-- Products content -->

            <div class="col-lg-12">

                <!-- Products header -->

                <div class="bg-white p-2 p-lg-3 shadow-sm mb-2 mb-lg-4">
                    <div class="d-flex justify-content-between">

                        <!-- Left -->

                        <div>
                            <div class="form-inline">
                                <div class="form-group mb-0">
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                        <option>All</option>
                                    </select>
                                    <label for="exampleFormControlSelect1" class="ml-3 d-none d-lg-block"><small>Showing all 24 of 128 products</small></label>
                                </div>
                            </div>
                        </div>

                        <!-- Right -->

                        <div>
                            <div class="form-inline">
                                <div class="mr-2">
                                    <a href="products-grid.html" class="btn btn-sm  text-primary" data-toggle="tooltip" data-placement="top" title="Grid view">
                                        <i class="fa fa-th-large"></i>
                                    </a>
                                    <a href="products-list.html" class="btn btn-sm " data-toggle="tooltip" data-placement="top" title="List view">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="exampleFormControlSelect2" class="mr-3 d-none d-lg-block"><small>Sort by</small></label>
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect2">
                                        <option>Name</option>
                                        <option>Price</option>
                                    </select>
                                </div>
                                <div class="d-lg-none ml-2">
                                    <button class="btn btn-primary btn-sm toggle-show" data-show="open-mobile-filters">
                                        <strong>
                                            <i class="icon icon-text-align-center"></i>
                                            <span class="d-none d-sm-inline-block">Filters</span>
                                        </strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products collection -->

                <div class="row gutters-mobile">
                    @foreach ($listSanPham as $value)
                    <div class="col-6 col-xl-4">
                        <div class="card card-fill border-0 mb-2 mb-lg-4 shadow-sm">
                            <div class="card-image">
                                <a href="/product/{{$value->id}}">
                                    <img src="{{$value->hinh_anh}}" class="card-img-top" alt="">
                                </a>
                            </div>
                            <div class="card-body p-3 p-lg-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h2 class="card-title mb-1 h5">
                                            <a href="/product/{{$value->id}}">
                                                {{ strlen($value->ten_san_pham) < 24 ? $value->ten_san_pham : Str::substr($value->ten_san_pham, 0, 24) . '...' }}
                                            </a>
                                        </h2>
                                        <small class="text-muted pre-label">
                                            <span>{{ number_format($value->don_gia_khuyen_mai, 0) }} đ</span>
                                            <s>{{ number_format($value->don_gia_ban, 0) }} đ</s>
                                        </small>
                                    </div>
                                    @if (Auth::guard('customer')->check())
                                        <div>
                                            <a class="d-inline-block addToCart" data-id="{{$value->id}}" data-toggle="tooltip" data-placement="top" title="Add to cart" >
                                                <i class="icon icon-cart font-size-xl"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div>
                                            <a class="d-inline-block toggle-show addToCart" data-show="loginComponent" data-toggle="tooltip" data-placement="top" title="Add to cart" >
                                                <i class="icon icon-cart font-size-xl"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center py-3 py-lg-4">
                        <li class="page-item disabled">
                            <a class="page-link page-link-first" href="#" tabindex="-1" aria-disabled="true">Prev</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

</section>
@endsection
