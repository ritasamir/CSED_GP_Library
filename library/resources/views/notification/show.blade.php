@extends('layouts.app')

@section('content')
		 <div class="container">
            <h1 style="padding-bottom: 10px">not Read</h1>
            <a href="/notification" action="{{$notificationsNotRead->markAsRead()}}" style="background-color: #ff7236;text-overflow: ellipsis;float: right" class="button"> markAsRead </a>
            <ul>          	
	            @foreach($notificationsNotRead as $notification)
	            	@if($notification->data['status']=='approved')
	            	<div class="row" style="padding-left: 25px;padding-bottom: 10px">
	            		<li><a href="#" style="color:dimgray;">Congratulation ! your post {{$notification->data['post']['title']}} has been approved</a>
	            		</li>
	            	</div>
	            	
	            	@endif
	            	@if($notification->data['status']=='disapproved')
	            	<div class="row" style="padding-left: 25px;padding-bottom: 10px">
	            	<li><a href="#" style="color:dimgray;">Sorry ! your post {{$notification->data['post']['title']}} has been disapproved</a>
	            	</li>
	            </div>
	            	@endif
	            @endforeach

			</ul>
            
           
        </div>

        <div class="container">
            <h1 style="padding-bottom: 10px">Read</h1>
            <ul>          	
	            @foreach($notificationsRead as $notification)
	            	@if($notification->data['status']=='approved')
	            	<div class="row" style="padding-left: 25px;padding-bottom: 10px">
	            		<li><a href="#" style="color:dimgray;">Congratulation ! your post {{$notification->data['post']['title']}} has been approved</a>
	            		</li>
	            	</div>
	            	
	            	@endif
	            	@if($notification->data['status']=='disapproved')
	            	<div class="row" style="padding-left: 25px;padding-bottom: 10px">
	            	<li><a href="#" style="color:dimgray;">Sorry ! your post {{$notification->data['post']['title']}} has been disapproved</a>
	            	</li>
	            </div>
	            	@endif
	            @endforeach

			</ul>
            
           
        </div>
	
	
@endsection