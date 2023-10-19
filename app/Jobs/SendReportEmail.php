<?php

namespace App\Jobs;

use App\Models\Report;
use App\Mail\ReportMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendReportEmail implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }
    public function handle()
    {
        Mail::to($this->report->recipients)->send(new ReportMail($this->report));
    }
}
