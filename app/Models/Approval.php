<?php

namespace App\Models;

use App\Enums\ApprovalEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approval extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Approval';

    protected $primaryKey = 'ApprovalId';

    protected $guarded = [
        'ApprovalCreatedAt',
        'ApprovalUpdatedAt',
        'ApprovalDeletedAt',
    ];

    protected $attributes = [
        'ApprovalStatus' => ApprovalEnum::WAITING,
    ];

    const CREATED_AT = 'ApprovalCreatedAt';

    const UPDATED_AT = 'ApprovalUpdatedAt';

    const DELETED_AT = 'ApprovalDeletedAt';
}
