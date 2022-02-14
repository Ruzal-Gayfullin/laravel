<?php

namespace App\Models;

use App\Casts\UserPasswordCast;
use App\Helpers\FileHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $picture
 *
 * @property-read Blog[] $blogs
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const PICTURE_PATH = '/users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'remember_token'
    ];

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
        'password' => UserPasswordCast::class,
    ];


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id', 'id');
    }

    public function getPicture()
    {
        if ($this->picture) {
            $picture_path = FileHelper::getStoragePath(true) . User::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->picture;

            if (file_exists($picture_path)) {
                return FileHelper::getStoragePath() . User::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $this->picture;;
            }
        }

        return FileHelper::getStoragePath() . User::PICTURE_PATH . DIRECTORY_SEPARATOR . 'default1.jpg';
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }
}
