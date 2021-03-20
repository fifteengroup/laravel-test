@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Order</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('orders.store') }}">
                        @include('orders.partials.form')
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".more_address_fields_wrapper"); //Fields wrapper
        var add_button      = $(".add_more_address_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}"><label for="product_name" class="col-md-4 control-label">Item/Product Name</label><div class="col-md-12"><input id="product_name" type="text" class="form-control" name="product_name[]"value="">@if ($errors->has('product_name'))<span class="help-block"><strong>{{ $errors->first('product_name') }}</strong></span>@endif</div></div><div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"><label for="price" class="col-md-4 control-label">Price</label><div class="col-md-12"><input id="price" type="text" class="form-control" name="price[]" value="">@if ($errors->has('price'))<span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>@endif</div></div><a href="#" class="remove_field">Remove</a>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
@endsection
