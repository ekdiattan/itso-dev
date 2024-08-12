<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'MasterUnit';

    protected $primaryKey = 'MasterUnitId';

    protected $guarded =
        [
            'MasterUnitCreatedAt',
            'MasterUnitUpdatedAt',
            'MasterUnitDeletedAt',
        ];

    const CREATED_AT = 'MasterUnitCreatedAt';

    const UPDATED_AT = 'MasterUnitUpdatedAt';

    const DELETED_AT = 'MasterUnitDeletedAt';
}
