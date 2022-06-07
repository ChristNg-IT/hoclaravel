@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    @if(session('msg'))
    <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger text-center">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif
    <h1>{{$title}}</h1>
    
    <form action="{{route('users.post-edit')}}" method="post">
        <div class="mb-3">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên..." value="{{old('fullname')  ??$userDetail->name}}">
            @error('fullname')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email..."  value="{{old('email')?? $userDetail->email}}">
            @error('email')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
@endsection