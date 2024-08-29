@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')
            <div class="layout-page">
                @include('layouts.topbar')
            </div>
        </div>
    </div>
@endsection