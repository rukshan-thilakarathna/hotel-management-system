<?php

namespace App\Models;

use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'emp_number',
        'post',
        'monthly_salary',
        'salary_date',
        'image',
        'type',
        'status',
        'address',
        'dob',
        'gender',
        'nationality',
        'marital_status',
        'religion',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
           'id'         => Where::class,
           'name'       => Like::class,
           'email'      => Like::class,
           'mobile_number'      => Like::class,
           'emp_number'      => Like::class,
           'post'      => Like::class,
           'monthly_salary'      => Like::class,
           'salary_date'      => Like::class,
           'image'      => Like::class,
           'type'      => Like::class,
           'address'      => Like::class,
           'gender'      => Like::class,
           'dob'      => Like::class,
           'nationality'      => Like::class,
           'marital_status'      => Like::class,
           'religion'      => Like::class,
           'updated_at' => WhereDateStartEnd::class,
           'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'email',
        'password',
        'mobile_number',
        'emp_number',
        'post',
        'monthly_salary',
        'salary_date',
        'image',
        'type',
        'status',
        'address',
        'dob',
        'gender',
        'nationality',
        'marital_status',
        'religion',
        'updated_at',
        'created_at',
    ];
}
