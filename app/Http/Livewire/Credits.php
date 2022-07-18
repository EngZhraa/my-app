<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Company;
use App\Models\Subject;
use App\Models\Credit;

class Credits extends Component
{   
    public $sub_id,$cred_num,$subject,$cred_amnt,$sub_name,$cred_open_date,$cred_exc_comp,$ex_price,$per_cred_cont,$ship_end_date,$cred_end_date,$notes;

    public $listeners = ['delete', 'deletecheckedcredit'];
    public $checkedCredit = [];


    public function render()
    {
        return view('livewire.credits',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'credits'=>Credit::orderby('cred_num','asc')->get(),
            'subjects'=>Subject::orderby('id','asc')->get(),
            'companies'=>Company::orderby('comp_name','asc')->get()
            
        ]);
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

