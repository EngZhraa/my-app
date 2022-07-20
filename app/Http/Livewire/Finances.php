<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\gover;


class Finances extends Component
{   
    public $proj_name,$assig_year,$proj_cost,$fina_type,$fina_classfic,$fina_amnt_loc,$fina_amnt_for,$notes,$benifit_comp;
    

    public $upd_proj_name,$upd_assig_year,$upd_proj_cost,$upd_fina_type,$upd_fina_classfic,$upd_fina_amnt_loc,$upd_fina_amnt_for,$upd_notes,$upd_benifit_comp;

    public $finance,$cont_date,$cont_num,$full_amnt_cont,$cont_end_date,$finn_type,$company;

    

    

    public $listeners = ['delete', 'deleteCheckedFinance'];
    public $checkedFinance = [];
    public function render()
    
    {
        return view('livewire.Finances',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'companies'=>Company::orderby('comp_name','asc')->get(),
            'govers'=>Gover::orderby('gov_name','desc')->get()
            
        ]);
    }
  
        public function con_rout()
    
        {
            return redirect()->to('/contracts');
        }
    
    
    public function OpenAddfinanceModal(){
        $this->proj_name='';
        $this->benifit_comp='';
        $this->assig_year='';
        $this->proj_cost='';
        $this->fina_type='';
        $this->fina_classfic='';
        $this->fina_amnt_loc='';
        $this->fina_amnt_for='';
        $this->notes='';
        
        $this->dispatchBrowserEvent('OpenAddfinanceModal');
    }

    public function save(){
        $this->validate([
            'proj_name'=>'required',
            'assig_year'=>'required',
            'proj_cost'=>'required',
            'fina_type'=>'required',
            'fina_classfic'=>'required',
            'fina_amnt_loc'=>'required',
            'fina_amnt_for'=>'required',
            ]
        ,[
            'finance.required'=>'يجب اختيار احدى القارات',
            'proj_name.required'=>'اسم المشروع مطلوب',
            'assig_year.required'=>'السنة مطلوبة',
            'proj_cost.required'=>'الكلفة مطلوبة',
            'fina_type.required'=>'يجب اختيار نوع التمويل',
            'fina_classfic.required'=>'يجب اختيار تبويب ',
            'fina_amnt_loc.required'=>'الرجاء ادخال تخصيص التبويب',
            'fina_amnt_for.required'=>'الرجاء ادخال تخصيص التبويب',

        ]
        );
    
            $save =Finance::insert([
            'proj_name'=>$this->proj_name,
            'benifit_comp'=>$this->benifit_comp,
            'assig_year'=>$this->assig_year,
            'proj_cost'=>$this->proj_cost,
            'fina_type'=>$this->fina_type,//نوع التمويل 
            'fina_classfic'=>$this->fina_classfic,//التبويب الحسابي
            'fina_amnt_loc'=>$this->fina_amnt_loc,
            'fina_amnt_for'=>$this->fina_amnt_for,
            'notes'=>$this->notes
            ]);
    
            if($save){
                $this->dispatchBrowserEvent('CloseAddfinanceModal');
                $this->checkedFinance = [];
            }
        
    }

    public function OpenEditFinanceModal($id){
        
        $info = Finance::find($id);
        $this->upd_proj_name = $info->proj_name;
        $this->upd_benifit_comp = $info->benifit_comp;
        $this->upd_assig_year = $info->assig_year;
        $this->upd_proj_cost = $info->proj_cost;
        $this->upd_fina_type = $info->fina_type;
        $this->upd_fina_classfic= $info->fina_classfic;
        $this->upd_fina_amnt_loc = $info->fina_amnt_loc;
        $this->upd_fina_amnt_for = $info->fina_amnt_for;
        $this->upd_notes = $info->notes;
        $this->cid = $info->id;
        $this->dispatchBrowserEvent('OpenEditFinanceModal',[
            'id'=>$id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
        'upd_proj_name'=>'required',
        'upd_benifit_comp'=>'required',
        'upd_assig_year'=>'required',
        'upd_proj_cost'=>'required',
        'upd_fina_type'=>'required',
        'upd_fina_classfic'=>'required',
        'upd_fina_amnt_loc'=>'required',
        'upd_fina_amnt_for'=>'required',
        'upd_notes'=>'required'
        ],['finance.required'=>'يجب اختيار احدى القارات',
        'upd_proj_name.required'=>'اسم المشروع مطلوب',
        'upd_assig_year.required'=>'السنة مطلوبة',
        'upd_proj_cost.required'=>'الكلفة مطلوبة',
        'upd_fina_type.required'=>'يجب اختيار نوع التمويل',
        'upd_fina_classfic.required'=>'يجب اختيار تبويب ',
        'upd_fina_amnt_loc.required'=>'الرجاء ادخال تخصيص التبويب',
        'upd_fina_amnt_for.required'=>'الرجاء ادخال تخصيص التبويب',

        ]);

        $update =Finance::find($cid)->update([

        'proj_name'=>$this->upd_proj_name,
        'benifit_comp'=>$this->upd_benifit_comp,
        'assig_year'=>$this->upd_assig_year,
        'proj_cost'=>$this->upd_proj_cost,
        'fina_type'=>$this->upd_fina_type,
        'fina_classfic'=>$this->upd_fina_classfic,
        'fina_amnt_loc'=>$this->upd_fina_amnt_loc,
        'fina_amnt_for'=>$this->upd_fina_amnt_for,
        'notes'=>$this->upd_notes
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditFinanceModal');
            $this->checkedFinance = [];
        }
    }

    public function DeleteConfirm($id){
        $info = Finance::find($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف <strong>'.$info->proj_name.'</strong>',
            'id'=>$id
        ]);
    }

    public function delete($id){
        $del = Finance::find($id)->delete();

        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
        $this->checkedFinance = [];
    }

    public function deleteFinances(){
        $this->dispatchBrowserEvent('swal:deleteFinances',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف هذه المشاريع',
            'checkedIDs'=>$this->checkedFinance,
        ]);
    }

    public function deleteCheckedFinances($ids){
        Finances::whereKey($ids)->delete();
        $this->checkedFinance = [];
    }

    public function IsChecked($financeId){
        return in_array($financeId, $this->checkedFinance) ? 'bg-info text-white' : '';
    }


    public function yearList(){

        
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

   


}
