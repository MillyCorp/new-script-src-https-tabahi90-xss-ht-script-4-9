@extends('admin::layout.main')
@section('style')

@stop
@section('left')
	@include('admin::layout.left.ims')
@stop
@section('content')
<div class="layui-body" id="LAY_app_body">
	<div class="layadmin-tabsbody-item layui-show">
		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				ims
			</div>
		</div>
	</div>
</div>
@stop