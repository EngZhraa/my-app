<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Subject;
use App\Models\Credit;
use App\Models\gover;

class Credits extends Component
{   
    public $sub_id,$cred_num,$subject,$cred_amnt,$sub_name,$cred_open_date,$cred_exc_comp,$ex_price,$per_cred_cont,$ship_end_date,$cred_end_date,$notes;
    public $upd_sub_id,$upd_cred_num,$upd_cred_amnt,$upd_sub_name,$upd_cred_open_date,$upd_cred_exc_comp,$upd_ex_price,$upd_per_cred_cont,$upd_ship_end_date,$upd_cred_end_date,$upd_notes;
    public $listeners = ['delete', 'deletecheckedcredit'];
    public $checkedCredit = [];


    public function render()
    {
        return view('livewire.credits',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'credits'=>Credit::orderby('cred_num','asc')->get(),
            'subjects'=>Subject::orderby('sub_name','asc')->get(),
            'companies'=>Company::orderby('comp_name','asc')->get(),   
            'govers'=>Gover::orderby('gov_name','desc')->get()
            
        ]);
    }

    public function enf_rout()
    
    {
        return redirect()->to('/enforcments');
    }
    public function rel_rout()
    
    {
        return redirect()->to('/enforcments');
    }
    
    
    public function OpenAddCreditModal(){  

        $this->cred_num='';
        $this->cred_amnt='';
        $this->cred_open_date='';
        $this->cred_exc_comp='';
        $this->ex_price='';
        $this->per_cred_cont='';
        $this->ship_end_date='';
        $this->cred_end_date='';
        $this->notes='';
        $this->dispatchBrowserEvent('OpenAddCreditModal');
        
    }

    public function save(){
        $this->validate
        ([
            'cred_num'=>'required',
            'cred_amnt'=>'required',
            'cred_open_date'=>'required',
            'cred_exc_comp'=>'required',
            'ex_price'=>'required',
            'per_cred_cont'=>'required',
            'ship_end_date'=>'required',
            'cred_end_date'=>'required',
            'notes'=>'required'
            
        ]);
    
            $save =Credit::insert
            ([
                'sub_id'=>$this->sub_id,
                'cred_num'=>$this->cred_num,
                'cred_amnt'=>$this->cred_amnt,
                'cred_open_date'=>$this->cred_open_date,
                'cred_exc_comp'=>$this->cred_exc_comp,
                'ex_price'=>$this->ex_price,
                'per_cred_cont'=>$this->per_cred_cont,
                'ship_end_date'=>$this->ship_end_date,
                'cred_end_date'=>$this-> cred_end_date,
                'notes'=>$this-> notes
           
            ]);
            
            if($save)
            {
                $this->dispatchBrowserEvent('CloseAddCreditModal');
                $this->checkedCredit = [];
            }
        
    }

    public function DeleteConfirm($id){
        $info =Credit::find($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف <strong>'.$info->cred_num.'</strong>',
            'id'=>$id
        ]);
    }


    public function OpenEditCreditModal($id){
        
        $info = Credit::find($id);
        $this->upd_sub_id = $info->sub_id;
        $this->upd_cred_num = $info->cred_num;
        $this->upd_cred_amnt = $info->cred_amnt;
        $this->upd_cred_open_date = $info->cred_open_date;
        $this->upd_cred_exc_comp = $info->cred_exc_comp;
        $this->upd_ex_price = $info->ex_price;
        $this->upd_per_cred_cont = $info->per_cred_cont;
        $this->upd_ship_end_date = $info->ship_end_date;
        $this->upd_cred_end_date = $info->cred_end_date;
        $this->upd_notes = $info->notes;
        $this->cid = $info->id;
        $this->dispatchBrowserEvent('OpenEditCreditModal',[
            'id'=>$id
        ]);
    }

    public function update(){

        $cid = $this->cid;
        $this->validate([
        'upd_sub_id'=>'required',
        'upd_cred_num'=>'required',
        'upd_cred_amnt'=>'required',
        'upd_cred_open_date'=>'required',
        'upd_cred_exc_comp'=>'required',
        'upd_ex_price'=>'required',
        'upd_per_cred_cont'=>'required',
        'upd_ship_end_date'=>'required',
        'upd_cred_end_date'=>'required',
        'upd_notes'=>'required'
        ],[
            'upd_sub_id.required'=>'يجب اختيار الموضوع',
            'upd_cred_num.required'=>'رقم الاعتماد مطلوب    ',
            'upd_cred_amnt.required'=>'قيمة الاعتماد مطلوب',
            'upd_cred_open_date.required'=>'تاريخ فتح الاعتماد مطلوب',
            'upd_cred_exc_comp.required'=>'required',
            'upd_ex_price.required'=>'required',
            'upd_per_cred_cont.required'=>'required',
            'upd_ship_end_date.required'=>'required',
            'upd_cred_end_date.required'=>'required',
            'upd_notes.required'=>'required' 
            
        ]);

        
            $update = Credit::find($cid)->update([
                
            'sub_id'=>$this->upd_sub_id,
            'cred_num'=>$this->upd_cred_num,
            'cred_amnt'=>$this->upd_cred_amnt,
            'cred_open_date'=>$this->upd_cred_open_date,
            'cred_exc_comp'=>$this->upd_cred_exc_comp,
            'ex_price'=>$this->upd_ex_price,
            'per_cred_cont'=>$this->upd_per_cred_cont,
            'ship_end_date'=>$this->upd_ship_end_date,
            'cred_end_date'=>$this->upd_cred_end_date,
            'notes'=>$this->upd_notes
        ]);

        if($update){
          
            $this->dispatchBrowserEvent('CloseEditCreditModal');
            $this->checkedCredit = [];
        }
    }

    public function delete($id){
        $del = Credit::find($id)->delete();

        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
        $this->checkedCredit = [];
    }

    public function deletecredits(){
        $this->dispatchBrowserEvent('swal:deleteCredits',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف هذه المواضيع',
            'checkedIDs'=>$this->checkedCredit,
        ]);
    }

    public function deletecheckedcredit($ids){
        Credit::whereKey($ids)->delete();
        $this->checkedCredit = [];
    }

    public function IsChecked($creditId){
        return in_array($creditId, $this->checkedCredit) ? 'bg-info text-white' : '';
    }
}

