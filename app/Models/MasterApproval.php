<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterApproval extends Model
{
    use HasFactory, SoftDeletes;

    protected 
    $table = 'MasterApproval',
    $primaryKey = 'MasterApprovalId',
    $guarded = 
    [
        'MasterApprovalCreatedAt',
        'MasterApprovalUpdatedAt',
        'MasterApprovalDeletedAt'
    ];
    
    public function position()
    {
        return $this->hasMany(Position::class, 'MasterPositionId', 'MasterApprovalPositionId');
    }
    
    const 
    CREATED_AT = 'MasterApprovalCreatedAt',
    UPDATED_AT = 'MasterApprovalUpdatedAt',
    DELETED_AT = 'MasterApprovalDeletedAt';
}
