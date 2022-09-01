<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'proj_name','benifit_comp','assig_year','proj_cost','fina_type','fina_classfic','fina_amnt_loc','fina_amnt_for','notes' 
        
    ];
}
