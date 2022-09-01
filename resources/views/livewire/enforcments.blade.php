<div>
   

    <button class="btn btn-primary btn-sm mb-3" wire:click="OpenAddEnforcmentModal()">اضافة تعزيز جديد</button>
    
    <div>
        @if ($checkedEnforcment)
            <button class="btn btn-danger" wire:click="deleteEnforcments()">حذف العقود المؤشرة ({{ count($checkedEnforcment) }})</button>
        @endif
    </div>
    <table class="table table-hover table-bordered ">
        <thead class="thead-inverse">
            <tr>
                <th></th>
                <th class="text-nowrap">اسم المشروع </th>
                <th class="text-nowrap">رقم العقد</th>
                <th class="text-nowrap"> رقم الاعتماد</th>
                <th class="text-nowrap">تاريخ التعزيز</th>
                <th class="text-nowrap">رقم التعزيز</th>
                <th class="text-nowrap">قيمة التعزيز</th>
                <th class="text-nowrap">سعر الصرف المعتمد</th>
                <th class="text-nowrap">رقم قيد التثبيت المحاسبي</th>
                <th class="text-nowrap">تاريخ قيد التثبيت المحاسبي</th>
                <th class="text-nowrap">الملاحظات</th>
                <th class="text-nowrap">العملية</th>
            </tr>
            </thead>
            <tbody>

                @forelse($enforcments as $enforcment)
                <tr class="{{ $this->IsChecked($enforcment->id) }}">
                    <td><input type="checkbox" value="{{ $enforcment->id }}" wire:model="checkedEnforcment"></td>
                    <td>{{ $enforcment->credit->subject->contract->finance->proj_name }}</td>
                    <td>{{ $enforcment->credit->subject->contract->cont_num }}</td>
                   <td >{{ $enforcment->credit->cred_num }}</td>
                    <td>{{ $enforcment->enf_date }}</td>
                    <td>{{ $enforcment->enf_num}}</td>
                    <td>{{ $enforcment->exch_rate}}</td>
                    <td>{{ $enforcment->enf_amnt }}</td>
                    <td>{{ $enforcment->offic_rec_num }}</td>
                    <td>{{ $enforcment->offic_rec_date  }}</td>
                    <td>{{ $enforcment->notes }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-danger btn-sm" wire:click='DeleteConfirm({{ $enforcment->id }})'>حذف</button>
                            <button class="btn btn-success btn-sm" wire:click='OpenEditEnforcmentModal({{ $enforcment->id }})'>تعديل</button>
                         
                        </div>
                    </td>
                </tr>
                @empty
                    <p>لا يوجد تعزيزات</p>
                @endforelse

            </tbody>
    </table>

  
    @include('modals.add-modal-e')
    @include('modals.edit-modal-e')
    

</div>