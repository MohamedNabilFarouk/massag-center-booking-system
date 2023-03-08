@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))

<div class="col-md-4 m-2">
    <div class="alert alert-success" style='z-index: 1000;'>
        <ul>
            <li>{{ Session::get('success')}}</li>
        </ul>
    </div>
</div>
@endif


@if(Session::has('Error'))
<div class="col-md-4 m-2">
    <div class="alert alert-danger" style='z-index: 1000;'>
        <ul>
            <li>{{ Session::get('Error')}}</li>
        </ul>
    </div>
</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">                                                                                  </script>
<script>

    $(document).ready(function(){
          $(".alert").slideDown(300).delay(5000).slideUp(300);
    });




    </script>
