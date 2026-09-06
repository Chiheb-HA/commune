<?php

namespace App\Mail;

use App\Models\CouncilSession;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CouncilSessionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public CouncilSession $session)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('messages.council_session_notification_subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.council-session-notification',
        );
    }
}