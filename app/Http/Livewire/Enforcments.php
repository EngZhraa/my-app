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

class Enforcments extends Component
{
    public $subject,$cred_id,$sub_id,$sub_name,$enf_num,$enf_date,$enf_amnt,$offic_rec_num,$exch_rate,$offic_rec_date,$notes;
    public $upd_cred_id,$upd_enf_num,$upd_enf_date,$upd_enf_amnt,$upd_exch_rate,$upd_offic_rec_num,$upd_offic_rec_date,$upd_notes;
    public $listeners = ['delete', 'deletecheckedcredit'];
    public $checkedEnforcment = [];

    public function render()
    {
        return view('livewire.Enforcments',[
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

    public function update(){
        $cid = $this->cid;
        $this->validate([
        'upd_enf_num'=>'required',
        'upd_enf_date'=>'required',
        'upd_enf_amnt'=>'required',
        'upd_offic_rec_num'=>'required',
        'upd_exch_rate'=>'required',
        'upd_offic_rec_date'=>'required',
        'upd_notes'=>'required',
        
        ],[
            'upd_enf_num.required'=>'يجب ادخال اسم المشروع',
            'upd_enf_date.required'=>'يجب ادخال تاريخ العقد',
            'upd_enf_amnt.required'=>'يجب ادخال رقم العقد',
            'upd_offic_rec_num.required'=>'يجب ادخال المبلغ الكلي للعقد',
            'upd_exch_rate.required'=>'يجب ادخال نوع التمويل   ',
            'upd_offic_rec_date.required'=>'يجب ادخال تاريخ انتهاء العقد',
            'upd_notes.required'=>' يجب اخال الجهة المنفذه للعقد ',
        ]);

        $update =Enforcment::find($cid)->update([
        'enf_num'=>$this->upd_enf_num,
        'enf_date'=>$this->upd_enf_date,
        'enf_amnt'=>$this->upd_cont_num,
        'offic_rec_num'=>$this->upd_offic_rec_num,
        'exch_rate'=>$this->upd_exch_rate,
        'offic_rec_date'=>$this->upd_offic_rec_date,
        'notes'=>$this->upd_notes,
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditEnforcmentModal');
            $this->checkedEnforcment= [];
        }
    }


    

    public function delete($id){
        $del = Enforcment::find($id)->delete();

        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
        $this->checkedEnforcment = [];
    }

    public function deleteEnforcment(){
        $this->dispatchBrowserEvent('swal:deleteEnforcment',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف هذه التعزيزات',
            'checkedIDs'=>$this->checkedEnforcment,
        ]);
    }

    public function deletecheckedEnforcment($ids){
        Enforcment::whereKey($ids)->delete();
        $this->checkedEnforcment = [];
    }

    public function IsChecked($EnforcmentId){
        return in_array($EnforcmentId, $this->checkedEnforcment) ? 'bg-info text-white' : '';
    }
}




