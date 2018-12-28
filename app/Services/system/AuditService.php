<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 4/13/18
 * Time: 2:49 PM
 */

namespace App\Services\system;


use OwenIt\Auditing\Models\Audit;

class AuditService
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getNormalAudits() {
        $data = Audit::query();
        return $data->paginate(20);
    }

    /**
     * @param $instance
     * @return mixed
     */
    public function getModelAudits($instance) {
        $data = $instance::query();
        return $data->paginate(20);
    }

}