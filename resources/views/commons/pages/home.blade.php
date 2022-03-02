@extends('commons.includes.master', ['pageId' => 'news'])

@section('title', 'Đây là title của trang')

@section('sidebar')
	@parent

	<p>Đây là sidebar</p>
@endsection

@section('content')
	<p>Đây là phần hiển thị nội dung chính của trang</p>
@endsection