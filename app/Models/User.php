<?php

namespace App\Models;

use Spatie\MediaLibrary\File;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_id',
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

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            // ->singleFile()
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['image/jpeg', 'image/png']);
            })
            ->registerMediaConversions(function(Media $media = null){
                $this->addMediaConversion('card')
                    ->width(400)
                    ->height(300);

                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });

        $this
            ->addMediaCollection('fotos')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/tiff']);
            });

        $this
            ->addMediaCollection('videos')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['video/x-msvideo', 'video/mpeg']);
            });
    }

    public function avatar()
    {
        return $this->hasOne(Media::class, 'id', 'avatar_id');
    }
}
