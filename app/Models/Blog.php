<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $title
 * @property string $slug
 * @property int $author_id
 * @property string $text
 * @property string $description
 * @property string $picture
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer category_id
 *
 *
 * @property-read BlogCategory[] $categories
 */
class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    public const PICTURE_PATH = '/blogs';

    public function categories()
    {
        return $this->hasMany(BlogCategory::class, 'id', 'category_id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function getPicturePath()
    {
        return FileHelper::FILES_PATH . Blog::PICTURE_PATH . '/' . $this->slug;
    }

    public function getPicture()
    {
        if ($this->picture) {
            $picture_path = FileHelper::getStoragePath(true) . Blog::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->slug . DIRECTORY_SEPARATOR . $this->picture;

            if (file_exists($picture_path)) {
                return FileHelper::getStoragePath() . Blog::PICTURE_PATH . DIRECTORY_SEPARATOR . $this->slug . DIRECTORY_SEPARATOR . $this->picture;;
            }
        }

        return FileHelper::getStoragePath() . Blog::PICTURE_PATH . DIRECTORY_SEPARATOR . 'default1.jpg';
    }
}

