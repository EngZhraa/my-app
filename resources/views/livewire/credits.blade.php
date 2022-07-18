<div>
   

    <button class="btn btn-primary btn-sm mb-3" wire:click="OpenAddCreditModal()">اضافةاعتماد جديد</button>
    
    <div>
        @if ($checkedCredit)
            <button class="btn btn-danger" wire:click="deleteCredit()">حذف العقود المؤشرة ({{ count($checkedCredit) }})</button>
        @endif
    </div>
    <table class="table table-hover table-bordered ">
        <thead class="thead-inverse">
            <tr>
                <th></th>
                <th class="text-nowrap">اسم المشروع</th>
                <th class="text-nowrap">رقم العقد</th>
                <th class="text-nowrap">رقم الاعتماد</th>
                <th class="text-nowrap">قيمة الاعتماد</th>
                <th class="text-nowrap"> تاريخ فتح الاعتماد</th>
                <th class="text-nowrap">الشركة الفاتحة للاعتماد</th>
                <th class="text-nowrap"> سعر الصرف</th>
                <th class="text-nowrap">نسبة الاعتماد من مبلغ العقد</th>
                <th class="text-nowrap">تاريخ انتهاء الشحن</th>
                <th class="text-nowrap">تاريخ غلق الاعتماد</th>
                <th class="text-nowrap">العملية</th>
            </tr>
            </thead>
            <tbody>
                @forelse($credits as $credit)
                <tr class="{{ $this->IsChecked($credit->id) }}">
                    <td><input type="checkbox" value="{{ $credit->id }}" wire:model="checkedCredit"></td>
                     <td>{{ $credit->subject->contract->finance->proj_name }}</td>
                     <td>{{ $credit->subject->contract->cont_num }}</td>
                    <td >{{ $credit->cred_num }}</td>
                    <td>{{ $credit->cred_amnt }}</td>
                    <td>{{ $credit->cred_open_date }}</td>
                    <td >{{ $credit->cred_exc_comp  }}</td>
                    <td>{{ $credit->ex_price }}</td>
                    <td>{{ $credit->per_cred_cont }}</td>
                    <td>{{ $credit->ship_end_date }}</td>
                    <td>{{ $credit->cred_end_date }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-danger btn-sm" wire:click='DeleteConfirm({{ $credit->id }})'>حذف</button>
                            <button class="btn btn-success btn-sm" wire:click='OpenEditcreditModal({{ $credit->id }})'>تعديل</button>
                           <button class="btn btn-primary btn-sm" wire:click='OpenAddCreditModal()'>اضافة اعتماد</button>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>لا يوجد اعتمادات</p>
                @endforelse

            </tbody>
    </table>


     @include('modals.add-modal-c')
</div>
