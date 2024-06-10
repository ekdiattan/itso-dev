<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'Employee';
    protected $primaryKey = 'EmployeeId';

    protected $guarded = 
    [
        'EmployeeCreatedAt',
        'EmployeeUpdatedAt',
        'EmployeeDeletedAt',
    ];

    protected $casts = [
        'EmployeeImage' => 'array'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'EmployeeId', 'UserEmployeeId');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'EmployeePositionId', 'MasterPositionId');
    }
    const CREATED_AT = 'EmployeeCreatedAt';
    const UPDATED_AT = 'EmployeeUpdatedAt';
    const DELETED_AT = 'EmployeeDeletedAt';
}
