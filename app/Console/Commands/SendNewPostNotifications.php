<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailToSubscriber;
use App\Models\Website;
use Illuminate\Console\Command;

class SendNewPostNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send new post to subscribers email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // get all websites with their subscribers and get the posts that have not been sent yet to avoid duplication
        $websites = Website::with(['subscribers.user', 'posts' => function ($query) {
            $query->where('email_sent', false);
        }])->get();

        // loop through all websites
        foreach ($websites as $website) {
            // loop through websites posts that have not been sent yet
            foreach ($website->posts as $post) {
                // send the post to the website subscribers
                foreach ($website->subscribers as $subscriber) {
                    SendEmailToSubscriber::dispatch($subscriber, $post);
                    // update the post that it has been sent already to avoid duplicate in the future
                    $post->email_sent = true;
                    $post->update();
                }

            }
        }
        $this->info("Email sent to subscribers for new posts");
    }
}
