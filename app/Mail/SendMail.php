<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

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
        return $this->from('smartcoffee97@gmail.com')->subject('Smart Coffee')->view('front.mail')->with('data',$this->data);
    }
    // $sql=select khachhang.email from khachhang where khachhang.email=$_POST['email'];
    // $kq=$db->query($sql);
    // if($kq==false)
    // {
    //     $err.='email đã tôn tại';
    // }
}
