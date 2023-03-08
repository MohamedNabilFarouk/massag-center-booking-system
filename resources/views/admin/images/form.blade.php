@php $input='title'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Title')}}<em class='red'>*</em></label>
                {!! Form::text($input,null,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='image_name'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Main Image')}}<em class='red'>*</em></label>
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
