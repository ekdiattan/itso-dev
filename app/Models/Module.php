<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MasterModule';

    protected $primaryKey = 'MasterModuleId';

    protected $guarded = [
        'MasterModuleCreatedAt',
        'MasterModuleUpdatedAt',
        'MasterModuleDeletedAt',
    ];

    const CREATED_AT = 'MasterModuleCreatedAt';

    const UPDATED_AT = 'MasterModuleUpdatedAt';

    const DELETED_AT = 'MasterModuleDeletedAt';
}
