<?php

use App\Models\Module;
use App\Models\Permission;

if (!function_exists('hasPermission')) 
{
    /**
     * 
     *
     * @param string 
     * @param string 
     * @return bool
     */

    function hasPermission($roleId, $modulecode)
    {
        $masterModule = Module::where('MasterModuleCode', $modulecode)->first();
        
        return Permission::
            where('PermissionRoleId', $roleId)
            ->where('PermissionModuleId', $masterModule->MasterModuleId)
            ->exists();
    }
}
