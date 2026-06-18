<?php

namespace App\Mail;

use App\Models\MaintenanceBill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Services\BillPdfService;

class MaintenanceBillMail extends Mailable
{
    use Queueable, SerializesModels;
    public $maintenanceBill;
    /**
     * Create a new message instance.
     */
    public function __construct(MaintenanceBill $maintenanceBill)
    {
        $this->maintenanceBill = $maintenanceBill;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Maintenance Bill Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.maintenance-bill',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $pdf = app(BillPdfService::class)->generate($this->maintenanceBill);

        $path =storage_path('app/temp/' . $this->maintenanceBill->bill_no . '.pdf');

        if(!file_exists(dirname($path))){
            mkdir(dirname($path),0777,true);
        }

        file_put_contents($path,$pdf->output());

        return [Attachment::fromPath($path)->as($this->maintenanceBill->bill_no . '.pdf')->withMime('application/pdf')];
    }
}
