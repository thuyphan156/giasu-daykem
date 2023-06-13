<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RegisterTeacher;

class SendMailToParent extends Mailable
{
    use Queueable, SerializesModels;

 
      protected $code;
      protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$email)
    {
        $this->code = $code;
        $this->email = $email;
        // $this->code = $code;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mã đánh giá gia sư ')->view('admin.assign-tutor.sendmailtoparent')
        ->with(['code' => $this->code,'name' => $this->email ]);
    }
}
