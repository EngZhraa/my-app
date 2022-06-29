<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['con_id','sub_num'];


    public function contract(){
        return $this->belongsTo(Contract::class,'con_id','id');
    }
}
