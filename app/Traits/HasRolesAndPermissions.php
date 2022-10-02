<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRolesAndPermissions{
    public function roles(){
        return $this->belongsToMany(Role::class, 'admin_role');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'admin_permission');
    }
}



?>