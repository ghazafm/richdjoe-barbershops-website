<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @param array $formData
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $redirectUrl = URL::to('/'); // Change this to your desired URL

        return $this->subject('New message from ' . $this->formData['name'])
            ->markdown('emails.contact_form_submitted')
            ->with([
                'formData' => $this->formData,
                'redirectUrl' => $redirectUrl,
            ]);
    }
}
