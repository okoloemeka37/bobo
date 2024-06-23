<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class post_mail extends Mailable
{
    use Queueable, SerializesModels;
public $data=[];
    /**
     * Create a new message instance.
     *
app/Mail/post_mail.php     * @return void
     */
    public function __construct($data)
    {
      return  $this->data=$data;
   
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
 public function build()
 {
 return $this->markdown("admin.emails.post_tem")->subject('jio');
 }
}
