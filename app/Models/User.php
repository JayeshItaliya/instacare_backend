<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helper\Helper;
use App\Models\MessageContact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public const TYPE_ADMIN = 1;
    public const TYPE_INSTACARE_STAFF = 2;
    public const TYPE_FACILITY_MEMBER = 3;
    public const TYPE_EMPLOYEE = 4;

    public static function getType(): array
    {
        return [
            self::TYPE_INSTACARE_STAFF => 'Instacare Staff',
            self::TYPE_FACILITY_MEMBER => 'Facility Member',
            self::TYPE_EMPLOYEE => 'Employee',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $appends = ['fullname', 'image_url', 'rolename'];

    public function getFullNameAttribute($value)
    {
        return $this->fname . ' ' . $this->lname;
    }
    public function getImageUrlAttribute($value)
    {
        return Helper::image_path($this->image);
    }

    public function getRolenameAttribute()
    {
        if ($this->role == 'administrator') {
            return 'Administrator';
        } elseif ($this->role == 'instacare_staff') {
            return 'Instacare Staff';
        } elseif ($this->role == 'facility_manager') {
            return 'Facility Manager';
        } elseif ($this->role == 'facility_staff') {
            return 'Facility Staff';
        } elseif ($this->role == 'front_desk') {
            return 'Front Desk';
        } elseif ($this->role == 'lpa') {
            return 'LPA';
        } elseif ($this->role == 'cna') {
            return 'CNA';
        } elseif ($this->role == 'rn') {
            return 'RN';
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function people_info()
    {
        return $this->hasOne('App\Models\UserOtherInfo', 'user_id', 'id')->select('*');
    }
    public function user_access_settings()
    {
        return $this->hasOne('App\Models\UserAccessSetting', 'user_id', 'id')->select('*');
    }
    public function user_permission_settings()
    {
        return $this->hasOne('App\Models\UserPermissionSetting', 'user_id', 'id')->select('*');
    }
    public function user_notification_settings()
    {
        return $this->hasOne('App\Models\UserNotificationSetting', 'user_id', 'id')->select('*');
    }
    public function user_other_settings()
    {
        return $this->hasOne('App\Models\UserOtherSetting', 'user_id', 'id')->select('*');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(MessageContact::class);
    }

    public static function getFacilityUsers( $type = null ): Collection
    {
        $users = self::select([
            'id', 'fname', 'lname', 'image', 'type',
        ])->whereNotIn('type', [self::TYPE_ADMIN]);

        if ( $type ) {
            $users->where([ 'type' => $type ]);
        }
        return $users->get();
    }
}
