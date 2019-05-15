<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InboundSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     
    protected $data = [];

    /**
     * Create a new job instance.
     *
     * @param $data array The data that the job needs, in this case a "payload"
     *  element with an incoming Nexmo SMS webhook in it.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $params = $this->data;
        $signature = new \Nexmo\Client\Signature($params['payload'], config('nexmo.signature_secret'), 'sha256');
        $isValid = $signature->check($params['payload']['sig']);

        if($isValid) {
            error_log("Message Verified: " . $params['payload']['text']);
        } else {
            error_log("Message Rejected");
        }
    }
}
