@extends('commons.layouts.dashboard', ['pageId' => 'news'])
@section('css')
<link rel="stylesheet" href="" media="all">
@endsection
<title>{{$title}}</title>
@section('content')
<div class="news">
    <h3>Tin trong ngày</h3>
    <p>Nội dung siêu ngắn cho tin tức mới đây!!!</p>
</div>
@endsection

@section('js')
<script src="{{ asset('js/news.js') }}"></script>
@endsection