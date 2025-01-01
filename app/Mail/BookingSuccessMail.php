<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingDetails;

    /**
     * Create a new message instance.
     *
     * @param array $bookingDetails
     * @return void
     */
    public function __construct($bookingDetails)
    {
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.booking_success') // The email view file
                    ->from('thilakarathnarukshan9@gmail.com')
                    ->subject('Booking Confirmation') // Set the email subject
                    ->with([
                        'bookingDetails' => $this->bookingDetails,
                    ]);
    }
}

