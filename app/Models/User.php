<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'User';

    protected $primaryKey = 'UserId';

    protected $guarded =
        [
            'UserCreatedAt',
            'UserUpdatedAt',
            'UserDeletedAt',
        ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'UserEmployeeId', 'EmployeeId');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'UserRoleId', 'MasterRoleId');
    }

    const CREATED_AT = 'UserCreatedAt';

    const UPDATED_AT = 'UserUpdatedAt';

    const DELETED_AT = 'UserDeletedAt';
}
