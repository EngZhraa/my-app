<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Subject;
use App\Models\Credit;
use App\Models\gover;

class Enforcments extends Component
{
    public $sub_id,$sub_name,$enf_num,$enf_date,$enf_amnt,$offic_rec_num,$exch_rate,$offic_rec_date,$notes;
    public $upd_enf_num,$upd_enf_date,$upd_enf_amnt,$upd_exch_rate,$upd_offic_rec_num,$upd_offic_rec_date,$upd_notes;
    public $listeners = ['delete', 'deletecheckedcredit'];
    public $checkedEnforcment = [];

    public function render()
    {
        return view('livewire.enforcments',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'credits'=>Credit::orderby('cred_num','asc')->get(),
            'subjects'=>Subject::orderby('id','asc')->get(),
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
            'enf_num='=>'required',
            'enf_date'=>'required',
            'enf_amnt'=>'required',
            'offic_rec_num'=>'required',
            'exch_rate='=>'required',
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
            'enf_num'=>$this->enf_num,
            'enf_date'=>$this->enf_date,
            'enf_amnt'=>$this->enf_amnt,
            'offic_rec_num'=>$this->cont_num,
            'full_amnt_cont'=>$this->offic_rec_num,
            'exch_rate'=>$this->exch_ratoffic_rec_datee,
            'offic_rec_date'=>$this->company,
            'notes'=>$this->notes,
            ]);
            
            if($save){
                $this->dispatchBrowserEvent('CloseAddEnforcmentModal');
                $this->checkedEnforcment = [];
            }
        
    }
    
    public function OpenEditContractModal($id){
        $info = Contract::find($id);
        $this->upd_finance = $info->fin_id;
        $this->upd_cont_date = $info->cont_date;
        $this->upd_cont_num = $info->cont_num;
        $this->upd_full_amnt_cont = $info->full_amnt_cont;
        $this->upd_finn_type = $info->finn_type;
        $this->upd_cont_end_date = $info->cont_end_date;
        $this->upd_company = $info->excut_comp;
        $this->cid = $info->id;
        $this->dispatchBrowserEvent('OpenEditContractModal',[
            'id'=>$id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
        'upd_finance'=>'required',
        'upd_cont_date'=>'required',
        'upd_cont_num'=>'required',
        'upd_full_amnt_cont'=>'required',
        'upd_finn_type'=>'required',
        'upd_cont_end_date'=>'required',
        'upd_company'=>'required',
        
        ],[
            'upd_finance.required'=>'يجب ادخال اسم المشروع',
            'upd_cont_date.required'=>'يجب ادخال تاريخ العقد',
            'upd_cont_num.required'=>'يجب ادخال رقم العقد',
            'upd_full_amnt_cont.required'=>'يجب ادخال المبلغ الكلي للعقد',
            'upd_finn_type.required'=>'يجب ادخال نوع التمويل   ',
            'upd_cont_end_date.required'=>'يجب ادخال تاريخ انتهاء العقد',
            'upd_excut_comp.required'=>' يجب اخال الجهة المنفذه للعقد ',
        ]);

        $update =Contract::find($cid)->update([
        'fin_id'=>$this->upd_finance,
        'cont_date'=>$this->upd_cont_date,
        'cont_num'=>$this->upd_cont_num,
        'full_amnt_cont'=>$this->upd_full_amnt_cont,
        'finn_type'=>$this->upd_finn_type,
        'cont_end_date'=>$this->upd_cont_end_date,
        'excut_comp'=>$this->upd_company,
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditContractModal');
            $this->checkedContract = [];
        }
    }

}
