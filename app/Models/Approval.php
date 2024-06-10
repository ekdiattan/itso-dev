<?php

namespace App\Models;

use App\Enums\ApprovalEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approval extends Model
{
    use HasFactory, SoftDeletes;
    
    protected 
    $table = 'Approval',
    $primaryKey = 'ApprovalId',
    $guarded = [
        'ApprovalCreatedAt',
        'ApprovalUpdatedAt',
        'ApprovalDeletedAt'
    ],

    $attributes = [
        'ApprovalStatus' => ApprovalEnum::WAITING
    ];
    
    const 
    CREATED_AT = 'ApprovalCreatedAt',
    UPDATED_AT = 'ApprovalUpdatedAt',
    DELETED_AT = 'ApprovalDeletedAt';
}
