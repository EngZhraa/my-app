<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المشاريع</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalart2.min.css') }}">
    <script data-require="bootstrap@3.3.2" data-semver="3.3.2" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
    @livewireStyles
</head>

@include('layouts.navigation')


<body>


    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-9 offset-md-1">
                <h4>تمويل المشاريع</h4><br>
                @livewire('finances')
                
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    @livewireScripts
    <script>
        window.addEventListener('OpenAddfinanceModal', function(){
            $('.addfinance').find('span').html('');
            $('.addfinance').find('form')[0].reset();
            $('.addfinance').modal('show');
            
        });
        
        
       window.addEventListener('CloseAddfinanceModal', function(){
            $('.addfinance').find('span').html('');
            $('.addfinance').find('form')[0].reset();
            $('.addfinance').modal('hide');
            alert('تمت اضافة المشروع جديد بنجاح');
       });

       window.addEventListener('OpenEditFinanceModal', function(event){
            $('.editfinance').find('span').html('');
            $('.editfinance').modal('show');
       });

       window.addEventListener('CloseEditFinanceModal', function(event){
            $('.editfinance').find('span').html('');
            $('.editfinance').find('form')[0].reset();
            $('.editfinance').modal('hide');
            alert('تمت عملية تعديل البيانات بنجاح');
       });
       window.addEventListener('OpenAddContractModal1', function(){
            $('.addContract').find('span').html('');
            $('.addContract').find('form')[0].reset();
            $('.addContract').modal('show');
        });
        window.addEventListener('CloseAddContractModal', function(){
            $('.addContract').find('span').html('');
            $('.addContract').find('form')[0].reset();
            $('.addContract').modal('hide');
            alert('تمت اضافة العقد جديد بنجاح');
       });

       window.addEventListener('SwalConfirm', function(event){
            swal.fire({
                title:event.detail.title,
                imageWidth:48,
                imageHeight:48,
                html:event.detail.html,
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'الغاء',
                confirmButtonText:'نعم، احذف',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#3085d6',
                width:300,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    
                    window.livewire.emit('delete',event.detail.id);
                }
            })
       });

       window.addEventListener('deleted', function(event){
           alert('تم حذف بيانات ');
       });

       window.addEventListener('swal:deletefinances', function(event){
            swal.fire({
                title:event.detail.title,
                html:event.detail.html,
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'كلا',
                confirmButtonText:'نعم',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#3085d6',
                width:300,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    window.livewire.emit('deleteCheckedfinances',event.detail.checkedIDs);
                }
            })
       });

    </script>
</body>
</html>
