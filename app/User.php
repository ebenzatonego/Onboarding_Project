<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'account',
        'photo',
        'birthday',
        'current_rank',
        'last_rank',
        'status',
        'phone',
        'address',
        'account_upper_al',
        'account_group_manager',
        'account_area_supervisor',
        'check_video_welcome_page',
        'check_video_congratulation',
        'check_content_popup',
        'alert_noti',
        'check_pdpa',
        'check_coc',
        'position',
        'organization_code',
        'organization_name',
        'area',
        'branch_code',
        'branch_name',
        'group_code',
        'license',
        'license_start',
        'license_expire',
        'ic_license',
        'ic_license_start',
        'ic_license_expire',
        'clm',
        'check_birthday',
        'elite_agency',
        'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
