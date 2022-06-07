<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unicode - Học lập trình web bài bản</title>
</head>
<body>
    <header>
        <h1>
            HEADER - UNICODE
        </h1>
        <h2>
            $title
        </h2>
    </header>
    <main>
        <h1>
            NỘI DUNG - UNICODE
        </h1>
        <h2>
            <?php //echo $content;?>
        </h2>
    </main>
    <header>
        <h1>FOOTER - UNICODE</h1>
    </header>
</body>
</html> -->

{{-- <h1>Trang chủ Unicode</h1>
<!-- người dùng có thể thay đổi nội dung thông qua url chuyển qua dạng thực thể giúp website an toàn hơn -->
<h2>{{ !empty($request->keyword)?$request->keyword:'Không có gì' }}</h2>
<div class = 'container'>
    <!-- những trường hợp bắt buộc biên dịch html -->
    {!! !empty($content)?$content:false !!}
</div>
<hr>
@for ($i = 1; $i<=10;$i++)
    <p>Phần tử thứ: {{$i}}</p>
@endfor

<hr>
@while($index<=10)
    <p>Phần từ thứ: {{$index}}</p>
    @php
        $index++;
    @endphp
@endwhile --}}

@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('sidebar')
    @parent
    <h3>
        Home sidebar
    </h3>
@endsection
@section('content')
    <h1>Trang chủ</h1>
    {{-- @datetime("2021-12-15 15:00:30") --}}
    @include('clients.contents.slide')
    @include('clients.contents.about')
    {{-- @datetime("2021-11-10 00:30:31") --}}

    @env('local')
    <p>Môi trường dev</p>
    @endenv

    <x-package-alert type='info' :content='$message' data-icon='youtube'/>
    {{--<x-inputs.button/>
    // <x-forms.button/>--}}
    <p><img src="https://znews-photo.zingcdn.me/w960/Uploaded/ygtmvd/2022_06_02/638_aHR0cHM6Ly9zMy5jb2ludGVsZWdyYXBoLmNvbS91cGxvYWRzLzIwMjItMDUvOWQ5MTIzYWEtODNhOC00Mzg2LWEyNTgtNTY2N2Y2ZWQ3YzJkLmpwZw_.jpg" alt=""></p>

    <p><a href="{{route('downloadImage').'?image=https://znews-photo.zingcdn.me/w960/Uploaded/ygtmvd/2022_06_02/638_aHR0cHM6Ly9zMy5jb2ludGVsZWdyYXBoLmNvbS91cGxvYWRzLzIwMjItMDUvOWQ5MTIzYWEtODNhOC00Mzg2LWEyNTgtNTY2N2Y2ZWQ3YzJkLmpwZw_.jpg'}}">Download ảnh</a></p>
@endsection

@section('css')
        <style>
            img{
                max-width: 100%;
                height: auto;
            }
        </style>
@endsection

@section('js')
@endsection