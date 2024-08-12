<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MasterRole';

    protected $primaryKey = 'MasterRoleId';

    protected $guarded =
        [
            'MasterRoleCreatedAt',
            'MasterRoleUpdatedAt',
            'MasterRoleDeletedAt',
        ];

    const CREATED_AT = 'MasterRoleCreatedAt';

    const UPDATED_AT = 'MasterRoleUpdatedAt';

    const DELETED_AT = 'MasterRoleDeletedAt';
}
