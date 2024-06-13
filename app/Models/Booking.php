<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'Booking';
    protected $primaryKey = 'BookingId';

    protected $guarded = 
    [
        'BookingCreatedAt',
        'BookingUpdatedAt',
        'BookingDeletedAt'
    ];

    protected $attributes = [
        'BookingApprovalStatus' => 0
    ];

    public function approval()
    {
        return $this->hasMany(Approval::class, 'ApprovalSourceId', 'BookingId');
    }

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'BookingAsetId', 'MasterAsetId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'BookingCreatedBy', 'UserId');
    }
    const CREATED_AT = 'BookingCreatedAt';
    const UPDATED_AT = 'BookingUpdatedAt';
    const DELETED_AT = 'BookingDeletedAt';
}
