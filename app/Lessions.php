<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessions extends Model
{
    //
    protected $fillable = ['title','body'];
   // protected $hidden = ['title'];

   public function transformCollectionns($item){
      return array_map([$this,'transFormer'], $item);
   }

   public function transFormer($item){
        return [
            'title' => $item['title'],
            'active' => (boolean) $item['some_bool'],
            'body' => $item['body']
        ];
   }
}
