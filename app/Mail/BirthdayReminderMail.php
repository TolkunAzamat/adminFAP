<?php

namespace App\Mail;

use App\Models\Residents;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Resident; // Замените на вашу модель жителя

class BirthdayReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resident;

    // public function __construct(Residents $resident)
    // {
    //     $this->resident = $resident;
    // }
    public $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        return $this->subject('Reminder: Birthday Coming Up')
            ->view('emails.birthday-reminder');
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FAP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.birthday-reminder',
        );
    }
     /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
