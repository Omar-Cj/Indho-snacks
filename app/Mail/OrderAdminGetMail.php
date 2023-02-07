<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderAdminGetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admindetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admindetails)
    {
        //
        $this->admindetails = $admindetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->admindetails['subject'])
                    ->view('email.orderadmingetmail');
    }

}
