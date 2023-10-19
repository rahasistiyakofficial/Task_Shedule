<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    public function build()
    {
        return $this
            ->subject('Report Email') 
            ->view('emails.report') 
            ->with(['report' => $this->report]); 
    }
}
