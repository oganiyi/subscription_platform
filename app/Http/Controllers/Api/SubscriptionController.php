<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Subscribe to a website.
     * @bodyParam website int required The ID of the website. Example: 2
     * @bodyParam user int required The ID of the user. Example: 2
     * @response {"success" : "true", "message" : "You have successfully subscribed to Sell Codes website"} 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'website' => 'required|exists:websites,id',
            'user' => [
                'required', 'exists:users,id', function ($attribute, $value, $fail) use ($request) {
                    $exist = Subscriber::where(['website_id' => $request->website, 'user_id' => $value])->exists();

                    if ($exist) {
                        $fail("You have already subscribed to our website.");
                    }
                }
            ]
        ]);

        $exist = 

        $subscriber = Subscriber::create([
            'website_id' => $request->website,
            'user_id' => $request->user
        ]);

        return response([
            'success' => true,
            'message' => "You have successfully subscribed to " . $subscriber->website->name . " website"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
