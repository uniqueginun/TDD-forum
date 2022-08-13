<?php

namespace App\Traits;

use App\Models\Article;

trait HasArticals
{
   public function articles()
   {
      return $this->hasMany(Article::class);
   }
}