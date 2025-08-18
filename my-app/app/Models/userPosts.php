<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userPosts extends Model
{
    /** Get the user that owns the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_post_id');
    }

    /** The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

     /** Get the attributes that should be cast
      *
      * @return array<string, string>
      */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
