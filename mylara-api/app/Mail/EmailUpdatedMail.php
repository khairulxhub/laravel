<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    // public $oldEmail;
    // public $newEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($_name, )
    {
        $this->name = $_name;
        // $this->oldEmail = $_oldEmail;
        // $this->newEmail = $_newEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your email address has been updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email-updated',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
