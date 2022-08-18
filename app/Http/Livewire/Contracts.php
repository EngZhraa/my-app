<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Subject;

class Contracts extends Component
{   
    public $finance,$cont_date,$cont_num,$full_amnt_cont,$cont_end_date,$finn_type,
    $company;

    public $upd_finance,$upd_cont_date,$upd_cont_num,$upd_full_amnt_cont,$upd_cont_end_date,$upd_finn_type,
    $upd_company;
    public $sub_name;

    public $listeners = ['delete', 'deleteCheckedContract'];
    public $checkedContract = [];

    public function sub_rout()
    
    {
        return redirect()->to('/subjects');
    }

        
    public function render()
    
    {
        return view('livewire.contracts',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'companies'=>Company::orderby('comp_name','asc')->get()
        ]);
    }

    public function OpenAddContractModal(){
        $this->finance='';
        $this->cont_date='';
        $this->cont_num='';
        $this->full_amnt_cont='';
        $this->finn_type='';
        $this->cont_end_date='';
        $this->company='';
        $this->dispatchBrowserEvent('OpenAddContractModal');
        
    }

    public function save(){
        $this->validate([
            'finance'=>'required',
            'cont_date'=>'required',
            'finn_type'=>'required',
            'cont_num'=>'required',
            'full_amnt_cont'=>'required',
   
            'cont_end_date'=>'required',
            'company'=>'required',
           
            ]
        ,[
            'finance.required'=>'يجب اختيار اسم المشروع',
            'cont_date.required'=>'يجب ادخال تاريخ العقد',
            'finn_type.required'=>'يجب اختيار  نوع العقد',
            'cont_num.required'=>'يجب ادخال رقم العقد',
            'full_amnt_cont.required'=>'يجب ادخال المبلغ الكلي للعقد',
            'cont_end_date.required'=>'يجب ادخال تاريخ  انتهاء العقد',
            'company.required'=>'يجب اختيار الجهة المنفذة',


        ]
        );
    
            $save =Contract::insert([
            'fin_id'=>$this->finance,
            'finn_type'=>$this->finn_type,
            'cont_date'=>$this->cont_date,
            'cont_num'=>$this->cont_num,
            'full_amnt_cont'=>$this->full_amnt_cont,
            'cont_end_date'=>$this->cont_end_date,
            'excut_comp'=>$this->company,
            ]);
            
            if($save){
                $this->dispatchBrowserEvent('CloseAddContractModal');
                $this->checkedContract = [];
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

    public function DeleteConfirm($id){
        $info = Contract::find($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف <strong>'.$info->cont_subj.'</strong>',
            'id'=>$id
        ]);
    }

    public function delete($id){
        $del = Contract::find($id)->delete();

        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
        $this->checkedContract = [];
    }

    public function deleteContracts(){
        $this->dispatchBrowserEvent('swal:deleteContracts',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف هذه البلدان',
            'checkedIDs'=>$this->checkedContract,
        ]);
    }

    public function deleteCheckedContracts($ids){
        Contracts::whereKey($ids)->delete();
        $this->checkedContract = [];
    }

    public function IsChecked($contractId){
        return in_array($contractId, $this->checkedContract) ? 'bg-info text-white' : '';
    }


    
    public function OpenAddSubjectModal(){
        $this->sub_name='';
        
        $this->dispatchBrowserEvent('OpenAddSubjectModal()');
        
    
}
}