<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name', 'type', 'extension', 'folder', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
