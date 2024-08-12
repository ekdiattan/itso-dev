<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MasterPosition';

    protected $primaryKey = 'MasterPositionId';

    protected $guarded =
        [
            'MasterPositionCreatedAt',
            'MasterPositionUpdatedAt',
            'MasterPositionDeletedAt',
        ];

    public function getemployee()
    {
        return $this->hasMany(Employee::class, 'EmployeePositionId', 'MasterPositionId');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'MasterPositionUnitId', 'MasterUnitId');
    }

    const CREATED_AT = 'MasterPositionCreatedAt';

    const UPDATED_AT = 'MasterPositionUpdatedAt';

    const DELETED_AT = 'MasterPositionDeletedAt';
}
