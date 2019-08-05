<?php

namespace App;
use App\posts;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'category';

    public function posts()
    {
        # code...
        return $this->hasMany(posts::class);
    }
}
