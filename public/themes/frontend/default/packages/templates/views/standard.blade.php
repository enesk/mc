@extends('layouts.default')
@section('content')
    <div class="container-fluid twoColorBorder"></div>
    <div class="container-fluid aboutUs" style="background-image: url({{ $page->header_bg }});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="aboutUs_title">{{ $page->title }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12 aboutUs_main">
                        {!! \Shortcode::compile($page->content) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{ \App\Helpers\MenuHelper::getSidebarMenu($page->sidebar_menu_id) }}
            </div>
        </div>
    </div>
@endsection