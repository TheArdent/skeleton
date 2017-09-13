<?php

namespace Modules\Users\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait,Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'agency_id',
        'city_id',
        'avatar',
        'payed_to',
        'block',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * This mutator automatically hashes the password.
     *
     * @var string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [$this->name, $this->surname]);
    }

    /**
     * Payed attribute
     * TODO refactor.
     *
     * @param $value
     */
    public function setPayedToAttribute($value)
    {
        if (isset($this->attributes['payed_to']) && is_int($value)) {
            $superTime = Carbon::parse($this->attributes['payed_to']);
            $nowTime = Carbon::now();

            $this->attributes['payed_to'] = ($superTime >= $nowTime)
                ? $superTime->addMonths($value)
                : $nowTime->addMonths($value);
        }
    }

    public function setBlockAttribute($value)
    {
        if (isset($this->attributes['block_to']) && is_int($value)) {
            $superTime = Carbon::parse($this->attributes['block_to']);
            $nowTime = Carbon::now();
            if ($superTime >= $nowTime) {
                $this->attributes['block_to'] = $superTime->addDays($value);
            } else {
                $this->attributes['block_to'] = $nowTime->addDays($value);
            }
        } else {
            $nowTime = Carbon::now();
            $this->attributes['block_to'] = $nowTime->addDays($value);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo('App\Agency', 'agency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function objects()
//    {
//        return $this->hasMany('App\Object', 'user_id');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany('App\Phone', 'user_id');
    }
}
