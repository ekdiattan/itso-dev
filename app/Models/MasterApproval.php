<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterApproval extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MasterApproval';

    protected $primaryKey = 'MasterApprovalId';

    protected $guarded =
        [
            'MasterApprovalCreatedAt',
            'MasterApprovalUpdatedAt',
            'MasterApprovalDeletedAt',
        ];

    public function position()
    {
        return $this->hasMany(Position::class, 'MasterPositionId', 'MasterApprovalPositionId');
    }

    const CREATED_AT = 'MasterApprovalCreatedAt';

    const UPDATED_AT = 'MasterApprovalUpdatedAt';

    const DELETED_AT = 'MasterApprovalDeletedAt';
}
