@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
{{-- @section('sidebar')
    @parent
    <h3>
        Products sidebar
    </h3>
@endsection --}}
@section('content')
    @if(session('msg'))
    <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif
    <h1>Sản phẩm</h1>
    <x-package-alert type ="info"/>
    @push('scripts')
    <script>
        console.log('Push lần 2')
    </script>
@endpush

@endsection

@section('css')

@endsection
@prepend('scripts')
    <script>
        console.log('Push lần 1')
    </script>
@endprepend
{{-- khi gọi push hay prepend thì nó sẽ thêm vào chỗ stack --}}
{{-- còn sử dụng section thì nó sẽ thay thế --}}