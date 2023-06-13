<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendApproveRegisterClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $registerClass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $registerClass)
    {
        $this->user = $user;
        $this->registerClass = $registerClass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('THƯ DUYỆT LỚP')->view('admin.register-classes.register_class_mail')
        ->with(['user' => $this->user, 'registerClass' => $this->registerClass]);
    }
}
