@extends('admin.layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?>
@endsection
@section('content')
    <div id="wrapper">
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')
    </div>
    <div class="content-page">
        <div class="content">
            <div class="container">

            </div>
        </div>
    </div>
    @include('admin.includes.setting')
    @include('admin.includes.contacts')
    @include('admin.includes.about')
@endsection