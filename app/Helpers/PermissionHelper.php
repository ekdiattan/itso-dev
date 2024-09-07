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

    function hasPermission($roleId, $moduleName)
    {
        $masterModule = Module::where('MasterModuleName', $moduleName)->first();
        
        return Permission::
            where('PermissionRoleId', $roleId)
            ->where('PermissionModuleId', $masterModule->MasterModuleId)
            ->exists();
    }
}
