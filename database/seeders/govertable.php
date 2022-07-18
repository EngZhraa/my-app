<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class govertable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('govers')->truncate(); 
        $file = Storage::disk('csv')->get('govers_.csv'); // return string
        $data = explode("\n",$file); // ['']
        $c=0;
        foreach($data as $key=>$value)
        {
            if($c==0)
            {
                $c = $c + 1;
              continue;  
            }
            // read line
            $newValue = explode(',',$value); // [1,baghdad]
            $gover = govers::where('name','=',$newValue[1])->get()->first();
            if(!$gover)
            {
               $gover = govers::create([
                   'name'=>$newValue[1]
               ]); 
            }
 }
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}
}