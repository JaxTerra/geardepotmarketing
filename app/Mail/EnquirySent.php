<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Enquiry;

class EnquirySent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var \App\Models\Enquiry
     */
    protected $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->replyTo($this->enquiry->email)
            ->subject('New Enquiry Mail |' .$this->enquiry->subject)
            ->markdown('emails.enquiry')
            ->with('enquiry', $this->enquiry);
    }
}
