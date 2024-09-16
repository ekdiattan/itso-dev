<?php
        
namespace App\Services;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
class PermissionService
{
    protected $permissionModel, $moduleModel, $roleModel;

    public function __construct(Permission $permissionModel, Module $moduleModel, Role $roleModel)
    {
        $this->permissionModel = $permissionModel;
        $this->moduleModel = $moduleModel;
        $this->roleModel = $roleModel;
    }
    public function index($user)
    {
        $rolesSA = $this->roleModel->where('MasterRoleName','SA')->first();

        if($user->role->MasterRoleName == 'AD')
        {
            $permissions = $this->permissionModel = $this->permissionModel->where('PermissionRoleId', '!=', $rolesSA->MasterRoleId)->get();
        }else{
            $permissions = $this->permissionModel->all();
        }
        
        $data = [
            'permission' => $permissions,
            'module' => $this->moduleModel->all(),
            'role' => $this->roleModel->all()
        ];

        return $data;
    }
}
