<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\MaintenanceBillMail;
use App\Models\MaintenanceBill;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMaintenanceBillJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    protected $bill;

    /**
     * Create a new job instance.
     */
    public function __construct(MaintenanceBill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(!empty($this->bill->member->email)){
            Mail::to($this->bill->member->email)->send(new MaintenanceBillMail($this->bill));
        }
    }
}
