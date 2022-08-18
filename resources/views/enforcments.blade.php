<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التعزيزات</title>
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
            <div class="col-md-6 offset-md-1">
                <h4>التعزيزات</h4>
                <br>
                @livewire('enforcments')

            </div>
        </div>  
    </div>

    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    @livewireScripts
    
<script type="text/javascript">

        window.addEventListener('OpenAddEnforcmentModal', function(){
            $('.addEnforcment').find('span').html('');
            $('.addEnforcment').find('form')[0].reset();
            $('.addEnforcment').modal('show');
        });
    
       
       window.addEventListener('CloseAddEnforcmentModal', function(){
            $('.addEnforcment').find('span').html('');
            $('.addEnforcment').find('form')[0].reset();
            $('.addEnforcment').modal('hide');
            alert('تمت اضافة العقد جديد بنجاح');
       });

       window.addEventListener('OpenEditEnforcmentModal', function(event){
            $('.editEnforcment').find('span').html('');
            $('.editEnforcment').modal('show');
       });

       window.addEventListener('CloseEditEnforcmentModal', function(event){
            $('.editEnforcment').find('span').html('');
            $('.editEnforcment').find('form')[0].reset();
            $('.editEnforcment').modal('hide');
            alert('تمت عملية تعديل البيانات بنجاح');
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

       window.addEventListener('swal:deleteEnforcments', function(event){
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
                    window.livewire.emit('deleteCheckedEnforcments',event.detail.checkedIDs);
                }
            })

           
       });


        

    </script>
</body>
</html>
