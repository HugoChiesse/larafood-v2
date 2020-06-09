<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    /**
     * Handle the tenant "creating" event.
     *
     * @param  Illuminate\Database\Eloquent\Model;
     * @return void
     */
    public function creating(Model $model)
    {
        $managerTenant = app(ManagerTenant::class);
        $model->tenant_id = $managerTenant->geTenantIdentify();
    }
}
