<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
