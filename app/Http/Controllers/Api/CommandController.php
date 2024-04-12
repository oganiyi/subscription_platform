<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{

    /**
     * Command for sending email for new posts.
     * @response {"success" : "true", "message" : "Email sent to subscribers for new posts"} 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function sendPostNotifications()
    {
        Artisan::call('posts:send-notifications');
        return response([
            'success' => true,
            'message' => 'Email sent to subscribers for new posts'
        ], 200);
    }
}
