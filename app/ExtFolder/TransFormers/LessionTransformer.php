<?php namespace App\ExtFolder\TransFormers;

class LessionTransformer extends Transformer{

  public function transform($lession){
        return [
            'title' => $lession['title'],
            'active' => (boolean) $lession['some_bool'],
            'body' => $lession['body']
        ];
    }

    public function beforeFilter(){
      
    } 
}