<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    
    protected $fillable = ['sub_id','cred_num','cred_amnt','sub_name','cred_open_date','cred_exc_comp','ex_price','per_cred_cont','ship_end_date','cred_end_date','notes'];

    public function finance(){
        return $this->belongsTo(Finance::class,'fin_id','id');
    }
    
    public function company(){
        return $this->belongsTo(Company::class,'excut_comp','comp_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'sub_id','id');
    }
}
