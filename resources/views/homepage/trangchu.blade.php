@extends("layouts.main")
@section("title","Trang chủ Golden Tree")
@section("content")
    @include('homepage.sections.slider')
    @include('homepage.sections.search')
    @include('homepage.sections.about')
    @include('homepage.sections.room_detail')
@endsection