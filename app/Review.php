<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = "reviews";

    protected $fillable = [
        'user_id',
        'item_id',
        'title',
        'comment',
        'stars',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(AppUser::class);
    }

}
