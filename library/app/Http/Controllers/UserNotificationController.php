<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show()
    {
        
        return view('notification.show',[
        	'notificationsNotRead'=> auth()->user()->unreadNotifications,
        	'notificationsRead'=> auth()->user()->readNotifications
        ]);
    }
    
}
