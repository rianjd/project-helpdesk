<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newSolutions extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

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
        if ($this->data['imagem'] != null){
            $this
                ->from ( config('mail.from.address'))
                ->subject("Chamado solucionado - ID: ".$this->data['id'])
                ->view('sender.mailSolutions')
                ->attach($this->data['imagem']->path(), [
                    'as' => 'acompanhamento-'.$this->data['id'].'.'.$this->data['imagem']->getClientOriginalExtension(),
                    'mime' => $this->data['imagem']->getClientMimeType()])
                ->with('data',$this->data);
        }
        else{
            $this
            ->from ( config('mail.from.address'))
            ->subject("Chamado solucionado - ID: ".$this->data['id'])
            ->view('sender.mailSolutions')
            ->with('data',$this->data);
        }
    }
}
