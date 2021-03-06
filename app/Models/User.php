<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url','currentTagPosition'
    ];
    public function bagtags()
    {
        return $this->belongsToMany(Bagtag::class)->using(BagtagUser::class)->withTimestamps();
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function shippingAddress(){
        return $this->hasOne(Address::class,'id','shipping_address_id');
    }
    public function getCurrentTagPositionAttribute(){
        $tag = $this->bagtags->sortByDesc('pivot.created_at')->first();
        if($tag != null){
            return $tag->tag_number;
        }
        else{
            return "Unassigned";
        }
    }
    public function getDonationAmountAttribute(){
        $payment = $this->payments->first();
        if($payment === null)
        {
            return 0;
        }
        $deductions = 500;
        if($this->shipping_address_id != null){
            $deductions = $deductions + 390;
        }
        return $payment->amount - $deductions;
    }
}
