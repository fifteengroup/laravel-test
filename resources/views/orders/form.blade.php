@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Order</div>
                <div class="card-body">
                	{!! Form::open(['route' => 'orders-store']) !!}
                        <div class="form-group">
                            {!! Form::label('company_id', 'Company', ['class' => 'col-form-label']) !!}
                            {!! Form::select('company_id', ['' => 'Please select...'] + $companies, NULL, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contact_id', 'Contact', ['class' => 'col-form-label']) !!}
                            {!! Form::select('contact_id', ['' => 'Please select...'], NULL, ['class' => 'form-control', 'disabled', 'required']) !!}
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="form-group">
                                        {!! Form::label('item', 'Item', ['class' => 'col-form-label']) !!}
                                        {!! Form::text('item[]', NULL, ['class' => 'form-control', 'placeholder' => 'Enter item', 'required']) !!}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <a class="btn btn-success btn-block" id="addItem">New Item</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $form = $('form');
        $form.find('select[name=company_id]').on('change', function (e) {
            $.get('/companies/contacts/' + $(this).val(), function(data) {
                var contacts = $('select[name=contact_id]');
                $.each(data, function(contact) {
                    contacts.append($('<option />').val(contact).text(data[contact]));
                });
            });
        });
        $("#addItem").click(function(){
            var itemRow = '<tr><td class="form-group"><label for="item" class="col-form-label">Item</label><input placeholder="Enter item" name="item[]" type="text" id="item" class="form-control"></td></tr>'
            $("table tbody").append(itemRow);
        });
    });
</script>
@endsection
