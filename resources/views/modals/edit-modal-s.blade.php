<div class="modal fade editSubject" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
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
                            <label for="">رقم العقد</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" wire:model="upd_con_id">
                                <option value="">اختر رقم العقد</option>
                                @foreach ($contracts as $contract)
                                    <option value="{{ $contract->id }}">{{ $contract->cont_num }}</option>
                                @endforeach      
                          </select>
                           
                        </div>
                            <span class="text-danger"> @error('upd_con_id') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">الموضوع</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="upd_sub_name">
                        </div>
                        <span class="text-danger"> @error('upd_sub_name') {{ $message }}@enderror</span>
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
