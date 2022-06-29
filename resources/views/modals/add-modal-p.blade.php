<div class="modal fade addfinance" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة مشروع جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for="">اسم المشروع</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder=" اسم المشروع" wire:model="proj_name">
                        </div>
                        <span class="text-danger"> @error('proj_name') {{ $message }}@enderror</span>
                    </div>
                     <div class="row g-3 align-items-center">
                         <div class="col-md-3">
                         <label for="">سنة التخصيص</label>
                         </div>
                            <div class="col-md-9">
                                <select class="form-select"  wire:model="assig_year">
                                     <option >اختر السنة </option>
                                     @for ($year = date('y') - 10 ; $year < date('y') + 10; $year++)
                                     <option value="{{ $year + 2000 }}"> {{ $year + 2000 }} </option>
                                     @endfor
                                </select>
                               </div>
                         <span class="text-danger"> @error('assig_year') {{ $message }}@enderror</span>
                     </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for="">الكلفة</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="الكلفة"  wire:model="proj_cost">
                        </div>
                        <span class="text-danger"> @error('proj_cost') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for="">نوع التمويل</label>
                        </div>
                        <div class="col-md-9">
                        <select class="form-select" wire:model="fina_type">
                            <option value="">اختر نوع التمويل</option>
                            <option value="استثماري">استثماري</option>
                            <option value="استثماري">تشغيلي</option>
                            <option value="قروض">قروض</option>
                            <option value="اخرى">اخرى</option>
                        </select>
                        </div>
                        <span class="text-danger"> @error('fina_type') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for="">التبويب الحسابي </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="التبويب الحسابي" wire:model="fina_classfic">
                        </div>
                        <span class="text-danger"> @error('fina_classfic') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for=""> تخصيص التبويب (العملة المحلية)</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="تخصيص التبويب (العملة المحلية)" wire:model="fina_amnt_loc">
                        </div>
                        <span class="text-danger"> @error('fina_amnt_loc') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for=""> تخصيص التبويب (العملة الاجنبية) </label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="تخصيص التبويب (العملة الاجنبية)" wire:model="fina_amnt_for">
                        </div>
                        <span class="text-danger"> @error('fina_amnt_for') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                        <label for="">الملاحظات</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="الملاحظات"  wire:model="notes">
                        </div>
                        <span class="text-danger"> @error('notes') {{ $message }}@enderror</span>
                    </div>
                    
                     <div class="form-group mb-3">
                         <button type="button" class="btn btn-danger btn-sm col-md-3" data-bs-dismiss="modal">اغلاق</button>
                         <button type="submit" class="btn btn-primary btn-sm col-md-3">حفظ</button>
                     </div>
                 </form>

            </div>
        </div>
    </div>
</div>
