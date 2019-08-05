<?php

namespace App;
use App\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class posts extends Model
{
    //
    protected $table = 'posts';
   use softDeletes;
   public function category()
  {
      # code...
      return $this->belongsTo(category::class);
  }

}
