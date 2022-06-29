<div>
   

    <button class="btn btn-primary btn-sm mb-3" wire:click="OpenAddfinanceModal()">اضافة مشروع جديد</button>
    <button class="btn btn-primary btn-sm mb-3" wire:click="con_rout">العقود</button>
    <div>
        @if ($checkedFinance)
            <button class="btn btn-danger" wire:click="deleteFinances()">حذف المشاريع المؤشرة ({{ count($checkedFinance) }})</button>
        @endif
    </div>
    <div class="table-responsive-lg">
    <table class="table table-hover table-bordered ">
        <thead class="thead-inverse">
            <tr>
                
                <th>#</th>
                <th>اسم المشروع</th>
                <th>سنة التخصيص</th>
                <th>الكلفة</th>
                <th>نوع التمويل</th>
                <th>تبويب حسابي</th>
                <th>تخصيص التبويب (العملة المحلية )</th>
                <th>تخصيص التبويب العملة الاجنبية</th>
                <th>العملية</th>
                </tr>
                </thead>
                <tbody>

                @forelse($finances as $finance)
                <tr class="{{ $this->IsChecked($finance->id) }}">
                    <td><input type="checkbox" value="{{ $finance->id }}" wire:model="checkedFinance"></td>
                    <td>{{ $finance->proj_name }}</td>
                    <td>{{ $finance->assig_year }}</td>
                    <td>{{ $finance->proj_cost }}</td>
                    <td>{{ $finance->fina_type }}</td>
                    <td>{{ $finance->fina_classfic }}</td>
                    <td>{{ $finance->fina_amnt_loc }}</td>
                    <td>{{ $finance->fina_amnt_for }}</td>
                    
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-danger btn-sm" wire:click='DeleteConfirm({{ $finance->id }})'>حذف</button>
                            <button class="btn btn-success btn-sm" wire:click='OpenEditFinanceModal({{ $finance->id }})'>تعديل</button>
                            <button class="btn btn-primary btn-sm" wire:click="OpenAddContractModal()"> عقد جديد</button>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>لا يوجد مشاريع</p>
                @endforelse

                </tbody>
    </table>

    @include('modals.add-modal-p')
    @include('modals.edit-modal-p')
    @include('modals.add-modal-s')
</div>
