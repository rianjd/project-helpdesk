<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers;

class newGerentesChamados extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this
            ->from ( config('mail.from.address'))
            ->subject("Novo chamado - Solicitação ".$this->data['tipo']." [ ".$this->data['id']."]")
            ->view('sender.mail')
            ->with('data',$this->data);
    }
}
