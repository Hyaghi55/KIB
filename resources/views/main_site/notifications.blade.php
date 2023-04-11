@extends('layouts.main_layout')
@section('content')
<div style="margin-top:2%;margin-bottom:2%;" class="container">
	<div class="row">
<h1 style="font-style: italic;
    font-weight: bold;
    color: #3544ab;">@lang('notifications_title')</h1>		
	</div>
@if (Auth::check())
@foreach (Auth::user()->notifications as $notification)

	

<div class="card container" style="width:100%;margin-top:2%;margin-bottom:2%">
  <div class="card-body">
    <h5 class="card-title">{{$notification->title}}</h5>
    <p class="card-text">{{$notification->body}}</p>
    <h5 style="color: #007bff;margin-left:85%" class="card-title">{{$notification->created_at->format('h:i A')}}</h5>
  </div>
</div>

@endforeach
</div>
@endif
@endsection