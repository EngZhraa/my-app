<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Subject;
use App\Models\Credit;
use App\Models\gover;
use App\Models\Enforcment;

class PayCond extends Component
{
    public $cred_id,$pay_con;
    public $upd_cred_id_pay_con,$upd_,$upd_percent;
    public $listeners = ['delete', 'deletecheckedcredit'];
    public $checkedEnforcment = [];


    public function render()
    {
        return view('livewire.pay_cond',[
            'enforcments'=>Enforcment::orderby('enf_num','asc')->get(),
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'credits'=>Credit::orderby('cred_num','asc')->get(),
            'subjects'=>Subject::orderby('sub_name','asc')->get(),
            'companies'=>Company::orderby('comp_name','asc')->get(),   
            'govers'=>Gover::orderby('gov_name','desc')->get()
        ]);
    }



    public function OpenAddEnforcmentModal(){
        $this->enf_num='';
        $this->enf_date='';
        $this->enf_amnt='';
        $this->offic_rec_num='';
        $this->exch_rate='';
        $this->offic_rec_date='';
        $this->notes='';
        $this->dispatchBrowserEvent('OpenAddEnforcmentModal');
        
    }

    public function save(){
        $this->validate([
            'enf_num'=>'required',
            'enf_date'=>'required',
            'enf_amnt'=>'required',
            'offic_rec_num'=>'required',
            'exch_rate'=>'required',
            'offic_rec_date'=>'required',
           
            ]
        ,[
            'enf_num.required'=>' يجب ادخال رقم كتاب التعزيز',
            'enf_date.required'=>'يجب ادخال تاريخ كتاب التعزيز',
            'enf_amnt.required'=>'يجب ادخال  مبلغ التعزيز',
            'offic_rec_num.required'=>'يجب ادخال رقم وتاريخ قيد التثبيت المحاسبي',
            'exch_rate.required'=>' يجب ادخال النسبة ',
            'offic_rec_date.required'=>' ',
           


        ]
        );
    
            $save =Enforcment::insert([
            'cred_id'=>$this->cred_id,
            'enf_num'=>$this->enf_num,
            'enf_date'=>$this->enf_date,
            'enf_amnt'=>$this->enf_amnt,
            'offic_rec_num'=>$this->offic_rec_num,
            'exch_rate'=>$this->exch_rate,
            'offic_rec_date'=>$this->offic_rec_date,
            'notes'=>$this->notes,
            ]);
            
            if($save){
                $this->dispatchBrowserEvent('CloseAddEnforcmentModal');
                $this->checkedEnforcment = [];
            }
        
    }
    
    public function OpenEditEnforcmentModal($id){
        $info = Contract::find($id);
        $this->upd_enf_num = $info->fin_id;
        $this->upd_enf_date = $info->enf_date;
        $this->upd_enf_amnt= $info->enf_amnt;
        $this->upd_offic_rec_num = $info->offic_rec_num;
        $this->upd_exch_rate = $info->exch_rate;
        $this->upd_offic_rec_date = $info->offic_rec_date;
        $this->upd_notes = $info->notes;
        $this->cid = $info->id;
        $this->dispatchBrowserEvent('OpenEditEnforcmentModal',[
            'id'=>$id
        ]);
    }




}
