<?php

namespace App\Mail;

use App\Models\Utilisateurs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemandeSuppression extends Mailable
{
    use Queueable, SerializesModels;

    public $objetid;
    public $objetnom;
    public $utilmail;

    public function __construct($objetid, $objetnom, $utilmail)
    {
        $this->objetid = $objetid;
        $this->objetnom = $objetnom;
        $this->utilmail = $utilmail;
    }

    /**
     * Create a new message instance.
     * 
     * 
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('emails.demande_suppression');
                    
    }
}