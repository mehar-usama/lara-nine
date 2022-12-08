<?php

namespace App\Observers;

use App\Models\AdminMenu;

class AdminMenuObserver
{
    /**
     * Handle the AdminMenu "created" event.
     *
     * @param  \App\Models\AdminMenu  $adminMenu
     * @return void
     */
    public function created(AdminMenu $adminMenu)
    {
        echo "created<pre>"; print_r($adminMenu); echo "</pre>"; die();
    }

    /**
     * Handle the AdminMenu "updated" event.
     *
     * @param  \App\Models\AdminMenu  $adminMenu
     * @return void
     */
    public function updated(AdminMenu $adminMenu)
    {
        echo "updated<pre>"; print_r($adminMenu); echo "</pre>"; die();
    }

    /**
     * Handle the AdminMenu "deleted" event.
     *
     * @param  \App\Models\AdminMenu  $adminMenu
     * @return void
     */
    public function deleted(AdminMenu $adminMenu)
    {
        echo "deleted<pre>"; print_r($adminMenu); echo "</pre>"; die();
    }

    /**
     * Handle the AdminMenu "restored" event.
     *
     * @param  \App\Models\AdminMenu  $adminMenu
     * @return void
     */
    public function restored(AdminMenu $adminMenu)
    {
        echo "restored<pre>"; print_r($adminMenu); echo "</pre>"; die();
    }

    /**
     * Handle the AdminMenu "force deleted" event.
     *
     * @param  \App\Models\AdminMenu  $adminMenu
     * @return void
     */
    public function forceDeleted(AdminMenu $adminMenu)
    {
        echo "forceDeleted<pre>"; print_r($adminMenu); echo "</pre>"; die();
    }
}
