@extends('auth.app')

@section('content')
    @include('pages.admin.menu')
    <div class="container my-5 actions">
        @yield('admin-content')
    </div>
@endsection
