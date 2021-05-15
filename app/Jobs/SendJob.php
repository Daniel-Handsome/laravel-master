<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // protected $mail_baining;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->mail_baining = $mail_baining;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $this->mail_baining = $mail_baining;
        // return 1111;
        return view('posts.create');
    }
}
