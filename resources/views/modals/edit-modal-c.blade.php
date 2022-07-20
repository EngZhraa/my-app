<div class="modal fade editCredit" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل عقد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3"> 
                            <input type="hidden" wide:model='cid'>
                        <label for="">المشروع</label>
                     </div>
                     <div class="col-md-9">
                        <select class="form-select" wire:model="upd_finance">
                              <option value="">اختر المشروع</option>
                              @foreach ($finances as $finance)
                                  <option value="{{ $finance->id }}">{{ $finance->proj_name }}</option>
                              @endforeach
                              
                        </select>
                        <span class="text-danger"> @error('upd_finance') {{ $message }}@enderror</span>
                    </div>
                   <div class="col-md-3">
                       <label for="">تاريخ العقد</label>
                   </div>
                   <div class="col-md-9">
                       <input type="date" class="form-control" placeholder="تاريخ العقد" wire:model="upd_cont_date">
                       <span class="text-danger"> @error('upd_cont_date') {{ $message }}@enderror</span>
                   </div>
                   <div class="col-md-3">
                       <label for="">رقم العقد</label>
                   </div>
                   <div class="col-md-9">
                       <input type="text" class="form-control" placeholder="رقم العقد" wire:model="upd_cont_num">
                       <span class="text-danger"> @error('upd_cont_num') {{ $message }}@enderror</span>
                   </div>
                   <div class="col-md-3">
                       <label for="">المبلغ الكلي</label>
                   </div>
                   <div class="col-md-9">
                       <input type="text" class="form-control" placeholder="المبلغ الكلي" wire:model="upd_full_amnt_cont">
                       <span class="text-danger"> @error('upd_full_amnt_cont') {{ $message }}@enderror</span>
                   </div>
                   <div class="col-md-3">
                    <label for="">نوع العملة </label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="نوع العملة" wire:model="upd_finn_type">
                    <span class="text-danger"> @error('upd_finn_type') {{ $message }}@enderror</span>
                </div>
                   <div class="col-md-3">
                       <label for="">تاريخ انتهاء العقد</label>
                   </div>
                   <div class="col-md-9">
                       <input type="date" class="form-control" placeholder="تاريخ انتهاء العقد" wire:model="upd_cont_end_date">
                       <span class="text-danger"> @error('upd_cont_end_date') {{ $message }}@enderror</span>
                   </div>

                   
                    <div class="col-md-3">
                        <label for="">الشركة المنفذة</label>
                    </div>
                    <div class="col-md-9">
                     <select class="form-select" wire:model="upd_company">
                           <option value="">اختر الشركة</option>
                           @foreach ($companies as $company)
                               <option value="{{ $company->comp_id }}">{{ $company->comp_name }}</option>
                           @endforeach      
                     </select>
                     <span class="text-danger"> @error('upd_company') {{ $message }}@enderror</span>
                    </div>
                    
                   <div class="col-md-3">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                   </div>
                 </form>

            </div>
        </div>
    </div>
</div>
