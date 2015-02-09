@extends('templates.1column')

@section('content')

    <h2 class="ui header">Create Warehouse</h2>

    <h4 class="ui dividing header">Warehouse information</h4>

    <div class="eight wide column">

        @include('partials.errors')

        {!! Form::open(['class' => 'ui small form', 'url' => 'warehouses']) !!}

            <div class="required field">
                <label for="name">Name</label>
                <input type="text" placeholder="Name" name="name">
            </div>

            <div class="field">
                <label for="contact">Contact</label>
                <input type="text" placeholder="Contact Person" name="contact">
            </div>

            <div class="required field">
                <label for="address">Address</label>
                <input type="text" placeholder="Address" name="address">
            </div>

            <div class="fields">
                <div class="four wide required field">
                    <label for="zip">Zip</label>
                    <input type="text" placeholder="Zip" name="zip">
                </div>
                <div class="twelve wide required field">
                    <label for="county">County</label>
                    <input type="text" placeholder="County" name="county">
                </div>
            </div>

            <div class="required field">
                <label for="email">E-mail</label>
                <input type="text" placeholder="E-mail address" name="email">
            </div>

            <div class="required field">
                <label for="tel">Telephone</label>
                <input type="text" placeholder="Phone number" name="tel">
            </div>

            <div class="required field">
                <label for="country">Country</label>
                <input type="text" placeholder="Country" name="country">
            </div>
            {!! Form::submit('Save', ['class' => 'ui blue right floated button']) !!}

        {!! Form::close() !!}

    </div>
@endsection