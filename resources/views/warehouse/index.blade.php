@extends('templates.1column')

@section('content')

    <div class="sixteen wide column">

    <h2 class="ui header">Warehouses</h2>

    <h4 class="ui dividing icon header">
        <div class="content">List of warehouses</div>
        <i class="add circle icon"></i>
    </h4>

    </br>
    </br>
    {!! link_to_route('warehousecreate_path', 'Create a Warehouse', null, ['class' => 'ui blue button']) !!}
    </div>

@stop