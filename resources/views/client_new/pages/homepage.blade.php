@extends('client_new.master')
@section('main_title')
    Home Page
@endsection
@section('sub_title')
    Welcome to Website
@endsection
@section('content')
    <!-- Header -->

    @include('client_new.components.title')

    <!-- Top columns -->

    @include('client_new.components.top_column')

    <!-- Sport collections -->

    @include('client_new.components.sport_collection')

    <hr class="m-0">

    <!-- Popular categories -->

    @include('client_new.components.popular_categories')

    <hr class="m-0">

    <!-- Sale black friday -->

    @include('client_new.components.black_friday')

    <!-- Banner winter is beautiful -->

    @include('client_new.components.banner_winter')

    <!-- Popular woman&#x27;s products -->

    @include('client_new.components.popular_woman')

    <!-- Footer banner -->

    @include('client_new.components.footer_banner')

    <!-- Clothing categories -->

    @include('client_new.components.clothing_categories')
@endsection
