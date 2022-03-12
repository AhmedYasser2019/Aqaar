<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Post
 * @package App\Models
 * @version February 28, 2022, 7:40 am UTC
 *
 */
class Post extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'posts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title', 'description', 'category_id', 'date', 'image', 'views'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
