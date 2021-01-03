<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function booted() {
        //comment is not created by user who does not belong to same group
        static::creating(function ($comment) {
            return !is_null($comment->photo->group->users->find($comment->user_id));
        });
    }

    /**
     * Renvoi l'utilisateur qui a mis la pièce jointe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function photo()
     {
         return $this->belongsTo(Photo::class);
     }

    /**
     * Renvoi l'utilisateur qui a posé la pièce jointe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    public function replyTo()
     {
        return $this->belongsTo(Comment::class,'comment_id','id');
     }

    public function replies()
     {
         return $this->hasMany(Comment::class);
     }
}
