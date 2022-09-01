<div class="modal fade editEnforcment" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">   
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل تعزيز</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                   <label for="">رقم الاعتماد </label>
                               </div>
                               <div class="col-md-9">
                                   <select class="form-select" wire:model="upd_cred_id">
                                       <option value="">رقم الاعتماد </option>
                                       @foreach ($credits as $credit)
                                           <option value="{{ $credit->id }}">{{ $credit->cred_num }}</option>
                                       @endforeach      
                                 </select>
                                
                               </div>
                                   <span class="text-danger"> @error('upd_cred_id') {{ $message }}@enderror</span>
                          
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for="">تاريخ التعزيز</label>
                               </div>
                               <div class="col-md-9">
                                <input type="date" class="form-control"   wire:model="upd_enf_date">
                               </div>
                               <span class="text-danger"> @error('upd_enf_date') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for=""> رقم كتاب التعزيز</label>
                               </div>
                               <div class="col-md-9">
                                <input type="text" class="form-control"   wire:model="upd_enf_num">
                               </div>
                               <span class="text-danger"> @error('upd_enf_num') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for=""> مبلغ التعزيز </label>
                               </div>
                               <div class="col-md-9">
                                <input type="text" class="form-control"   wire:model="upd_enf_amnt">
                               </div>
                               <span class="text-danger"> @error('upd_enf_amnt') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for="">سعر الصرف المعتمد</label>
                               </div>
                               <div class="col-md-9">
                                   <input type="text" class="form-control"   wire:model="upd_exch_rate">
                               </div>
                               <span class="text-danger"> @error('upd_exch_rate') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for=""> رقم قيد التثبيت المحاسبي</label>
                               </div>
                               <div class="col-md-9">
                                <input type="text" class="form-control"   wire:model="upd_offic_rec_num">
                               </div>
                               <span class="text-danger"> @error('upd_offic_rec_num') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for="">تاريخ قيد التثبيت المحاسبي</label>
                               </div>
                               <div class="col-md-9">
                                <input type="date" class="form-control"   wire:model="upd_offic_rec_date">
                               </div>
                               <span class="text-danger"> @error('upd_offic_rec_date') {{ $message }}@enderror</span>
                           </div>
                           <div class="row g-3 align-items-center">
                               <div class="col-md-3">
                                <label for="">الملاحظات</label>
                               </div>
                               <div class="col-md-9">
                                <input type="text" class="form-control"   wire:model="upd_notes">
                               </div>
                               <span class="text-danger"> @error('upd_notes') {{ $message }}@enderror</span>
                           </div>
                          <div class="col-md-3">
                           <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">اغلاق</button>
                           <button type="submit" class="btn btn-primary btn-sm">حفظ </button>
                          </div>
                       </form>

            </div>
        </div>
    </div>
</div>
