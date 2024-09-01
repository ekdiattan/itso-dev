<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Permission';

    protected $primaryKey = 'PermissionId';

    protected $guarded =
    [
        'PermissionCreatedAt',
        'PermissionUpdatedAt',
        'PermissionDeletedAt'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'PermissionModuleId', 'MasterModuleId');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'PermissionRoleId', 'MasterRoleId');
    }

    const CREATED_AT = 'PermissionCreatedAt';

    const UPDATED_AT = 'PermissionUpdatedAt';

    const DELETED_AT = 'PermissionDeletedAt';
}
