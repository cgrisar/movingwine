@extends('templates.1column')

@section('content')

    <h2 class="ui header">Create Relationship</h2>

    <h4 class="ui dividing header">Relationship information</h4>

    <div class="eight wide column">

        @include('partials.errors')

        {!! Form::open(['class' => 'ui small form', 'url' => 'relationships/create']) !!}

        <div class="required field">
            <label for="name">Name</label>
            <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
        </div>

        <div class="required field">
            <label for="vat">VAT</label>
            <input type="text" placeholder="VAT" name="vat" value="{{old('vat')}}">
        </div>

        <div class="hidden divider"></div>
        <h4 class="ui dividing header">Adresses</h4>
        <table id="adressesTable" class="ui sortable table verticalalign">
            <thead>
                <tr>
                    <th class="one wide">Type</th>
                    <th class="six wide">Address</th>
                    <th class="two wide">Phone</th>
                    <th class="two wide">Email</th>
                </tr>
            </thead>
        </table>

        {!! Form::submit('Save', ['class' => 'ui blue right floated button']) !!}

        {!! Form::close() !!}

    </div>
@endsection

@section('dTScript')
    <script>
        var editor ;

        $(document).ready(function(){

            $('#adressesTable').dataTable({

                "layout": '<div data-feature="dt_Table"></div>',

                "ajax": "/admin/relationshipAddressesAjax",

                "columns": [
                    { "data": null,
                      "render": function(row, type, val, meta){
                          return "1"
                      }
                    },
                    { "data": null,
                      "render": function(row, type, val, meta){
                          return row.address + "</br>" + row.zip + "&nbsp;" + row.county + "</br>" + row.country
                      }},
                    { "data": "phone" },
                    { "data": "email" }
                ]
            });

            $('.ui.dropdown')
                    .dropdown();
        });
    </script>
@stop