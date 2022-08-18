<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enforcment extends Model
{
    use HasFactory;

    protected $fillable = ['cred_id','enf_num','offic_rec_num','enf_date','exch_rate','enf_amnt','offic_rec_date','notes'];
    
    public function credit(){
        return $this->belongsTo(Credit::class,'cred_id','id');
    }

}