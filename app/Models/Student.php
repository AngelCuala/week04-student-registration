<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile_number',
        'gender',
        'date_of_birth',
        'program',
        'year_level',
        'address',
        'profile_picture',
    ];

    /**
     * Attribute casting.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Accessor for the student's full name.
     */
    public function getFullNameAttribute(): string
    {
        $middle = $this->middle_name ? " {$this->middle_name} " : ' ';
        return "{$this->first_name}{$middle}{$this->last_name}";
    }

    /**
     * Accessor for the public URL of the profile picture.
     */
    public function getProfilePictureUrlAttribute(): string
    {
        return asset('storage/' . $this->profile_picture);
    }
}
