<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Admin\Models\Information\Information;

class SendMailRegisterUser extends Mailable
{
//    use  SerializesModels;
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = isset($this->data['email']) ?  $this->data['email'] : ''; // email được nhận
        // $address =   $address; // email được nhận
        $subject = 'Tài khoản mật khẩu truy cập website'; //Tiêu đề
        $name = 'Hệ thống website'; // Ai gủi đi

        return $this->view('email.register_user')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data ]);
    }
}
