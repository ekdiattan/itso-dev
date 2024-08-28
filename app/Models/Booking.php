<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'Booking';

    protected $primaryKey = 'BookingId';

    protected $guarded =
        [
            'BookingCreatedAt',
            'BookingUpdatedAt',
            'BookingDeletedAt',
        ];

    protected $attributes = [
        'BookingStatus' => 0,
    ];
    
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'BookingAsetId', 'MasterAsetId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'BookingEmployeeId', 'UserId');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'BookingEmployeeId', 'EmployeeId');
    }

    const CREATED_AT = 'BookingCreatedAt';

    const UPDATED_AT = 'BookingUpdatedAt';

    const DELETED_AT = 'BookingDeletedAt';
}
