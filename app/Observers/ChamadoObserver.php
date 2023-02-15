<?php

namespace App\Observers;

use App\Models\Chamado;

class ChamadoObserver
{
    /**
     * Handle the Chamado "created" event.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return void
     */
    public function created(Chamado $chamado)
    {
//
    }

    /**
     * Handle the Chamado "updated" event.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return void
     */
    public function updated(Chamado $chamado)
    {
        //
    }

    /**
     * Handle the Chamado "deleted" event.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return void
     */
    public function deleted(Chamado $chamado)
    {
        //
    }

    /**
     * Handle the Chamado "restored" event.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return void
     */
    public function restored(Chamado $chamado)
    {
        //
    }

    /**
     * Handle the Chamado "force deleted" event.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return void
     */
    public function forceDeleted(Chamado $chamado)
    {
        //
    }
}
