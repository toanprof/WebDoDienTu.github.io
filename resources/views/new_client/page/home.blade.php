@extends('new_client.master')
@section('content')
  <div class="clearfix"></div>
  <!-- masterslider -->
  @include('new_client.components.slide')
  <!-- end of masterslider -->
  <div class="clearfix"></div>

  @include('new_client.components.featured_product')
  <!-- end section -->
  <div class="clearfix"></div>

  @include('new_client.components.collection')
  <!--end section-->
  <div class="clearfix"></div>

  @include('new_client.components.best_seller')
  <!-- end section -->
  <div class="clearfix"></div>

  @include('new_client.components.follow')
  <!--end section-->
  <div class="clearfix"></div>

@endsection
