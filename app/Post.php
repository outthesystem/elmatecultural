<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'category_id',
      'title',
      'description',
      'date_init',
      'hour',
      'place',
      'entrytype',
      'price',
      'webfacebook',
      'email',
      'image',
      'approved',
      'sticky'
  ];

  public function category()
  {
    return $this->hasOne('App\Category', 'id', 'category_id');
  }

  public function scopePopular($query)
 {
     return $query->where('approved', 1);
 }
}
