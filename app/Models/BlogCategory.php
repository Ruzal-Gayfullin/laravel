<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 */
class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category';
}
