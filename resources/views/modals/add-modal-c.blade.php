
<div class="modal fade addCredit" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة موضوع جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
             <form wire:submit.prevent="save">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <label for="">الموضوع </label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" wire:model="sub_id">
                                <option value="">اختر موضوع</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->sub_name }}</option>
                                @endforeach      
                          </select>
                         
                        </div>
                            <span class="text-danger"> @error('sub_name') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">رقم الاعتماد</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="cred_num">
                        </div>
                        <span class="text-danger"> @error('cred_num') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">قيمة الاعتماد</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="cred_amnt">
                        </div>
                        <span class="text-danger"> @error('cred_amnt') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">تاريخ فتح الاعتماد</label>
                        </div>
                        <div class="col-md-9">
                         <input type="date" class="form-control"   wire:model="cred_open_date">
                        </div>
                        <span class="text-danger"> @error('cred_num') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">الشركة الفاتحة للاعتماد</label>
                        </div>
                        <div class="col-md-9">
                        <select id="gover" class="form-select"  wire:model="cred_exc_comp" >
                            <option value="">اختر الشركة</option>
                            @foreach (App\Models\Gover::orderBy('gov_name','desc')->get() as $gover)
                            <option value="{{ $gover->gov_name}}">{{ $gover->gov_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <span class="text-danger"> @error('cred_exc_comp') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">سعر الصرف</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="ex_price">
                        </div>
                        <span class="text-danger"> @error('ex_price') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">نسبة الاعتماد من مبلغ العقد</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="per_cred_cont">
                        </div>
                        <span class="text-danger"> @error('per_cred_cont') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">تاريخ انتهاء الشحن</label>
                        </div>
                        <div class="col-md-9">
                         <input type="date" class="form-control" min="{{$cred_open_date}}"   wire:model="ship_end_date">
                        </div>
                        <span class="text-danger"> @error('ship_end_date') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">تاريخ غلق الاعتماد</label>
                        </div>
                        <div class="col-md-9">
                         <input type="date" class="form-control"  min="{{$cred_open_date}}" wire:model="cred_end_date">
                        </div>
                        <span class="text-danger"> @error('cred_end_date') {{ $message }}@enderror</span>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                         <label for="">الملاحظات</label>
                        </div>
                        <div class="col-md-9">
                         <input type="text" class="form-control"   wire:model="notes">
                        </div>
                        <span class="text-danger"> @error('notes') {{ $message }}@enderror</span>
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