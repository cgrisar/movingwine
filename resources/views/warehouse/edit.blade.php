@extends('templates.1column')

@section('content')

    <h2 class="ui header">Edit Warehouse {{ $warehouse->name }}</h2>

    <h4 class="ui dividing header">Warehouse information</h4>

    <div class="eight wide column">

        @include('partials.errors')

        {!! Form::open(['class' => 'ui small form', 'url' => 'warehouses']) !!}

        <div class="required field">
            <label for="name">Name</label>
            <input type="text" placeholder="Name" value="{{ $warehouse->name }}" name="name">
        </div>

        <div class="field">
            <label for="contact">Contact</label>
            <input type="text" placeholder="Contact Person" value="{{ $warehouse->contact }}" name="contact">
        </div>

        <div class="required field">
            <label for="address">Address</label>
            <input type="text" placeholder="Address" value="{{ $warehouse->address }}" name="address">
        </div>

        <div class="fields">
            <div class="four wide required field">
                <label for="zip">Zip</label>
                <input type="text" placeholder="Zip" value="{{ $warehouse->zip }}" name="zip">
            </div>
            <div class="twelve wide required field">
                <label for="county">County</label>
                <input type="text" placeholder="County" value="{{ $warehouse->county }}" name="county">
            </div>
        </div>

        <div class="required field">
            <label for="email">E-mail</label>
            <input type="text" placeholder="E-mail address" value="{{ $warehouse->email }}" name="email">
        </div>

        <div class="required field">
            <label for="tel">Telephone</label>
            <input type="text" placeholder="Phone number" value="{{ $warehouse->tel }}" name="tel">
        </div>

        <div class="required field">
            <label for="country">Country</label>
            <input type="text" placeholder="Country" value="{{ $warehouse->country }}" name="country">
        </div>
        {!! Form::submit('Save', ['class' => 'ui blue right floated button']) !!}

        {!! Form::close() !!}

    </div>
@endsection