@extends('templates.1column')

@section('content')

    <div class="sixteen wide column">

        <h2 class="ui header">Relationships</h2>

        <h4 class="ui dividing header">List of relationships</h4>

        @if($relationships->isEmpty())
            <div class="ui primary inverted red segment">
                <p>No relationship has been defined.</p>
            </div>
        @else
            <table id="relationshipTable" class="ui table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>VAT</td>
                        <td colspan="2" class="center aligned">Actions</td>
                    </tr>
                </thead>
            </table>
            @endif

            </br>
            </br>

            {!! link_to('relationships/create', 'Create a Relationship', ['class' => 'ui blue right button']) !!}

    </div>

@stop


@section('dTScript')
    <script>
        $(document).ready(function(){
            $('#relationshipTable').dataTable({
                "ajax": "admin/relationshipsajax",
                "columns": [
                    {"data": "name"},
                    {"data": "vat"}
                ]
            });
        });
    </script>
@stop