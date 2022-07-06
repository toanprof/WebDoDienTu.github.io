<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('admin.share.head')
</head>
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    @include('admin.share.top')
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        @include('admin.share.menu')
    </div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
               @yield('title')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.share.foot')
    @include('admin.share.bottom')
    @yield('js')
</body>
</html>
