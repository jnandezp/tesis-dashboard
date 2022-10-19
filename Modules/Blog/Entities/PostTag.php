<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tag';

    protected $fillable = ['post_id', 'tag_id'];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\PostTagFactory::new();
    }
}
