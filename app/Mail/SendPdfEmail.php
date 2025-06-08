<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF; 
use App\Models\Reservasi;

class SendPdfEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservasi;

    /**
     * Create a new message instance.
     */
    public function __construct($reservasi)
    {
        $this->reservasi = $reservasi;
    }   

    /**
     * Build the message.
     */
    public function build()
    {
        // Menggenerate PDF menggunakan view 'email_laporan'
        $pdf = PDF::loadView('email_laporan', ['reservasi' => $this->reservasi]);

        // Membuat email dengan view 'email_laporan' dan lampiran PDF
        return $this->view('email_laporan')
                    ->subject('Laporan data transaksi')
                    ->attachData($pdf->output(), 'reservasi.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
