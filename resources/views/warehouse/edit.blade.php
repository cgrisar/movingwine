@extends('templates.2column-even')

@section('header')

    <h2 class="ui header">Edit Warehouse {{ $warehouse->name }}</h2>

@stop


@section('left-content')

    <h4 class="ui dividing header">Warehouse information
        <div class="floatrighticon">
            <i class="edit icon"></i>
            <i class="save icon"></i>
        </div>
    </h4>

    @include('partials.errors')

    <form method="POST" action="{{ action('WarehouseController@edit', $id) }}" class="ui small form">

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <div class="required field">
            <label for="name">Name</label>
            <input type="text" placeholder="Name" value="{{ $warehouse->name }}" name="name">
        </div>

        <div class="required field">
            <label for="excise">Excise Number</label>
            <input type="text" placeholder="Warehouse Excise Number" value="{{ $warehouse->excise    }}" name="excise">
        </div>

        <div class="ui divider"></div>

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
            <label for="country">Country</label>
            <input type="text" placeholder="Country" value="{{ $warehouse->country }}" name="country">
        </div>

        <div class="required field">
            <label for="email">E-mail</label>
            <input type="text" placeholder="E-mail address" value="{{ $warehouse->email }}" name="email">
        </div>

        <div class="required field">
            <label for="tel">Telephone</label>
            <input type="text" placeholder="Phone number" value="{{ $warehouse->tel }}" name="tel">
        </div>

        {!! Form::submit('Save Changes', ['class' => 'ui blue right floated button']) !!}

    </form>

@stop


@section('right-content')

    <h4 class="ui dividing header">Slots
        <div class="floatrighticon">
            <i class="file outline icon"></i>
        </div>
    </h4>

    @if($slots = $warehouse->slots->all())
        <table class="ui small basic table" id="rightcolumntable">
            <thead>
                <tr>
                    <td>Address</td>
                    <td>Excise</td>
                    <td>Capacity</td>
                    <td>In Slot</td>
                    <td colspan="2" class="center aligned">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($slots as $slot)
                <tr>
                    <td>{{ $slot->address }}</td>
                    <td class="center aligned">
                        @if((boolean)$slot->excise)
                            <i class="checkmark icon"></i>
                        @else
                            <i class="minus icon"></i>
                        @endif
                    </td>
                    <td>{{ $slot->capacity }}</td>
                    <td></td>
                    <td class="center aligned"><i class="edit icon"</td>
                    <td class="center aligned">
                        <?php $str1 = "javascript:OpenModalDelete('";
                        $str1 .= $slot->address;
                        $str1 .= "',";
                        $str1 .= "'";
                        $str1 .= action('SlotController@destroy', [$warehouse->id, $slot->id]);
                        $str1 .= "');"; ?>
                        <a href="{{ $str1 }}"> <i class="delete icon"</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="ui small modal" id="slotform">
            <i class="close icon"></i>
            <div class="header">
                Modal Title
            </div>
            <div class="content">
                <form class="ui form">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="required field">
                        <label for="address">Address</label>
                        <input type="text" placeholder="Address of the slot" name="address">
                    </div>
                </form>
            </div>
        </div>

        <div class="ui small modal" id="deleteModal" style="margin-top:-1px;">
                <i class="close icon"></i>
                <div class="header">
                    Delete warehouse
                </div>
                <div class="content">
                    Do you want to delete slot <div id="slot">?</div>
                </div>
                <div class="actions">
                    <div class="ui negative button">No</div>
                    <a id="href">
                        <div class="ui positive right button">Yes</div></a>
                </div>
        </div>
    @else
        <div class="ui inverted red segment" id="slotsmessage">
            <p>No slots have been defined for this warehouse</p>
        </div>
    @endif
@stop

@section('extrajs')
    <script>
        function OpenModalDelete(slot, url){
            document.getElementById("slot").innerHTML = slot;
            document.getElementById("href").href = url;
            $('#deleteModal')
                    .modal('setting', {
                        closable : false,
                        onApprove : function () {
                        }
                    })
                    .modal('show');
        };
    </script
@stop
