@extends('master')

@section('content')
<?php
    $messege = Session::get('messege');
    if($messege){
    ?>

    <p class="col-md-12 bg-success text-white p-3">
        <?php echo $messege;?>
    </p>
    <?php Session::put('messege', null); }?>
<form action="/add_medicine" method="post" autocomplete="off">
        {{ csrf_field()}}

    <div class="col-md-12 d-flex ">
        <div class="col-md-6 mt-5 mb-5">
            <h3 class="">Welcome: <span class="text-info">{{Session::get('user_name')}}</span></h3>
        </div>


    </div>


    <table id="medicine-table" class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Generic Name</th>
                <th>Manufacturer</th>
                <th>MRP/Unit</th>
                <th><a href="#" class="btn btn-success addRow" id="addRow">Add</a></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <input type="text"  name="brand_name[]"  placholder="brand name" class="form-control form-control-alternative{{ $errors->has('brand_name') ? ' is-invalid' : '' }}">
                    @if ($errors->has('brand_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_name') }}</strong>
                        </span>
                     @endif
                </td>
                <td>
                    <select  name="generic_id[]" style="width:250px !important; height: 40px !important; margin:0px !important; padding:0px !important;"  class="form-control generic form-control-alternative{{ $errors->has('generic_id') ? ' is-invalid' : '' }}">
                        <option value="">Choose Option</option>
                         @foreach ($generics as $generic )
                        <option value="{{$generic->generic_id}}">{{$generic->generic_name}}</option>

                        @endforeach
                    </select>
                    @if ($errors->has('generic_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('generic_id') }}</strong>
                        </span>
                     @endif
                </td>
                <td>
                    <select name="man_id[]" style="width:250px !important; height: 50px !important;"  class="form-control man form-control-alternative{{ $errors->has('man_id') ? ' is-invalid' : '' }}">
                        <option value="">Choose Option</option>
                         @foreach ($mans as $man )
                        <option value="{{$man->man_id}}">{{$man->man_name}}</option>

                        @endforeach
                    </select>
                    @if ($errors->has('man_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('man_id') }}</strong>
                        </span>
                     @endif
                </td>
                <td><input type="text" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]" placholder="MRP per unit">
                    @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                     @endif
                </td>
                <input name="user_id[]" type="hidden" value="{{Session::get('user_id')}}">
               <td><a href="#" class="btn btn-danger remove">Remove</a></td>
            </tr>


        </tbody>



    </table>

    <input type="submit" class="btn btn-success" style="margin-bottom:100px; min-width:300px">


</form>




@endsection

@section('script')
<script type="text/javascript">

    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
                '<td><input type="text" class="form-control  form-control-alternative{{ $errors->has("brand_name") ? " is-invalid" : '' }}" name="brand_name[]" placholder="brand name"></td>'+
                '<td>'+
                    '<select  name="generic_id[]" style="width:250px !important; height: 50px !important;"  class="form-control generic form-control-alternative{{ $errors->has("generic_id") ? " is-invalid" : '' }}">'+
                        '<option value="">Choose Option</option>'+
                         '@foreach ($generics as $generic )'+
                       ' <option value="{{$generic->generic_id}}">{{$generic->generic_name}}</option>'+

                        '@endforeach'+
                    '</select>'+
                   ' @if ($errors->has("generic_id"))'+
                        '<span class="invalid-feedback" role="alert">'+
                            '<strong>{{ $errors->first("generic_id") }}</strong>'+
                        '</span>'+
                     '@endif'+
               ' </td>'+
                '<td>'+
                     '<select name="man_id[]" style="width:250px !important; height: 50px !important;"  class="form-control man form-control-alternative{{ $errors->has("man_id") ? " is-invalid" : '' }}">'+
                        '<option value="">Choose Option</option>' +
                         '@foreach ($mans as $man )' +
                        '<option value="{{$man->man_id}}">{{$man->man_name}}</option>' +

                        '@endforeach' +
                    '</select>' +
                    ' @if ($errors->has("man_id"))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first("man_id") }}</strong></span>@endif'+
                '</td>'+

                '<td><input type="text" class="form-control form-control-alternative{{ $errors->has("price") ? " is-invalid" : '' }}" name="price[]" placholder="MRP per unit">'+
                    ' @if ($errors->has("price"))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first("price") }}</strong></span>@endif'+
                '</td>'+
                '<input name="user_id[]" type="hidden" value="{{Session::get("user_id")}}">'+
                '<td><a href="#" class="btn btn-danger remove">Remove</a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };
    $(document).on('click', '.remove', function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }

    });

    $('.generic').select2({
        placeholder: "choose option",
        allowClear:true,
    });
    $('.man').select2({
        placeholder: "choose option",
        allowClear:true,
    });


    var target = document.querySelector('#medicine-table tbody');
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
        if (mutation && mutation.addedNodes) {
            mutation.addedNodes.forEach(function(elm) {
                $(elm).find('.generic').select2({
                    placeholder: "choose option",
                    allowClear:true
                });
                $(elm).find('.man').select2({
                    placeholder: "choose option",
                    allowClear:true
                
                });
            });
        }
        });
    });
    observer.observe(target, {
    childList: true,
    subtree: true
    });


</script>

@endsection
