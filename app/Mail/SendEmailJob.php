<?php
namespace Modules\Setting\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details_of_email;

    public function __construct($details_of_email)
    {
        $this->details_of_email = $details_of_email;
    }

    public function handle()
    {
        
        #verification_code ,email ,password,name,url_link,blade,subject,type
        $input['email']   = $this->details_of_email['email'];
        $input['subject'] = $this->details_of_email['subject'];
        $verification_code='';
        if(($this->details_of_email['type']=='verify_account') ||($this->details_of_email['type']=='verify_forget_password') ||($this->details_of_email['type']=='re_verify_account') )
        {
            $verification_code=$this->details_of_email['verification_code'];
        }
        Mail::send(
                $this->details_of_email['blade'], 
                [
                    'verification_code'    =>  $verification_code,
                    'name'                 =>  $this->details_of_email['name'],
                    'password'             =>  $this->details_of_email['password'], //not appear in verify forget password
                    'url_link'             =>  $this->details_of_email['url_link'],
                    'extra_data'           =>  $this->details_of_email['extra_data'],
                    'target_message'       => $this->details_of_email['message'],
                    
                    
                ], function ($message) use ($input) 
                {
                    $message->subject($input['subject']);
                    $message->to($input['email']); 
                    // $message->from("infinitejourneys@murabba.blog"); 
                }
       );        
    }
}

