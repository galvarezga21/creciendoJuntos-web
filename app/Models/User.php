<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'address',
        'profile_photo_path',
        'role_id',
        'country_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->profile_photo_path
                    ? Storage::url($this->profile_photo_path)
                    : 'https://ui-avatars.com/api/?name='.urlencode($this->first_name.' '.$this->last_name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Interact with the user's first name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->first_name} {$this->last_name}",
        );
    }

    /**
     * Get the role that owns the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the country that owns the user.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the psychologist profile associated with the user.
     */
    public function psychologistProfile(): HasOne
    {
        // Placeholder for future implementation
        return $this->hasOne(PsychologistProfile::class); // Ensure this model exists or comment out if strict
        // Since the class doesn't exist yet, I'll return a generic hasOne or just comment it out to avoid errors.
        // The user said "déjalo preparado mentalmente". I will just add the method but maybe return null or comment logic.
        // Better: I'll assume the model doesn't exist and just put the method there. But if I use `PsychologistProfile::class` it will error if file missing.
        // I will use string reference 'App\Models\PsychologistProfile'.
        return $this->hasOne('App\Models\PsychologistProfile');
    }
    
     /**
     * Get the patient profile associated with the user.
     */
    public function patientProfile(): HasOne
    {
         return $this->hasOne('App\Models\PatientProfile');
    }
}
