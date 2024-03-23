<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'profile_id';


    protected $fillable = [
        'user_id',
        'employee_id',
        'name',
        'gender',
        'dob',
        'age',
        'position',
        'dept',
        'bio',
        'phone_no',
        'address',
        'profile_picture',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Accessor to get the full URL of the profile picture
    public function getProfilePictureUrlAttribute()
    {
        return $this->attributes['profile_picture']
            ? asset('storage/' . $this->attributes['profile_picture'])
            : null;
    }


    // Mutator to store the profile picture in storage
    public function setProfilePictureAttribute($file)
{
    $this->attributes['profile_picture'] = $file
        ? Storage::disk('public')->put('profile_pictures', $file)
        : null;
}

}


