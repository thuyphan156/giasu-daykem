<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RegisterTeacher;

class SendInformationAssignTutor extends Mailable
{
    use Queueable, SerializesModels;

    protected $registerTeacher;
      protected $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registerTeacher)
    {
        $this->registerTeacher = $registerTeacher;
        // $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('THƯ MỜI GIẢNG DẠY')->view('admin.assign-tutor.assign-tutor_mail')
        ->with(['registerTeacher' => $this->registerTeacher ]);
    }
}
