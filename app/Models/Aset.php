<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MasterAset';

    protected $primaryKey = 'MasterAsetId';

    protected $guarded =
        [
            'MasterAsetCreatedAt',
            'MasterAsetUpdatedAt',
            'MasterAsetDeletedAt',
        ];

    const CREATED_AT = 'MasterAsetCreatedAt';

    const UPDATED_AT = 'MasterAsetUpdatedAt';

    const DELETED_AT = 'MasterAsetDeletedAt';
}
