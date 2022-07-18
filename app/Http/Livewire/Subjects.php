<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Finance;
use App\Models\Contract;
use App\Models\Subject;

class subjects extends Component
{   
    public $con_id,$sub_name, $contract , $finance;

    public $listeners = ['delete', 'deletecheckedSubject'];
    public $checkedSubject = [];

    public function render()
    {
        return view('livewire.subjects',[
            'finances'=>Finance::orderby('assig_year','asc')->get(),
            'contracts'=>Contract::orderby('cont_date','asc')->get(),
            'subjects'=>Subject::orderby('sub_name','asc')->get()
        ]);
    }

    
    public function OpenAddSubjectModal(){       
        $this->sub_name='';
        $this->dispatchBrowserEvent('OpenAddSubjectModal');
        
    }
    
    public function cred_rout()
    
    {
        return redirect()->to('/credits');
    }


    public function save(){
        $this->validate
        ([
            'sub_name'=>'required',
            
        ]);
    
            $save =Subject::insert
            ([
                'con_id'=>$this->con_id,
                'sub_name'=>$this->sub_name,
           
            ]);
            
            if($save)
            {
                $this->dispatchBrowserEvent('CloseAddSubjectModal');
                $this->checkedSubject = [];
            }
        
    }

    public function DeleteConfirm($id){
        $info =Subject::find($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف <strong>'.$info->cont_subj.'</strong>',
            'id'=>$id
        ]);
    }

    public function delete($id){
        $del = Subject::find($id)->delete();

        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
        $this->checkedSubject = [];
    }

    public function deleteSubjects(){
        $this->dispatchBrowserEvent('swal:deleteContracts',[
            'title'=>'هل انت متأكد؟',
            'html'=>'من حذف هذه المواضيع',
            'checkedIDs'=>$this->checkedSubject,
        ]);
    }

    public function deletecheckedSubject($ids){
        Subject::whereKey($ids)->delete();
        $this->checkedSubject = [];
    }

    public function IsChecked($subjectId){
        return in_array($subjectId, $this->checkedSubject) ? 'bg-info text-white' : '';
    }
}
