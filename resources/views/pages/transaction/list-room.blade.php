@extends($layout)
@section('title')
@section('content')
<style>
    #room-type-accordion .card-room {
        height: 9rem;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, .3);
        box-sizing: border-box;
        border-radius: .5rem;
        position: relative;
        background: hsla(126, 60%, 62%, 1);

        background: linear-gradient(45deg, hsla(126, 60%, 62%, 1) 0%, hsla(120, 84%, 29%, 1) 100%);

        background: -moz-linear-gradient(45deg, hsla(126, 60%, 62%, 1) 0%, hsla(120, 84%, 29%, 1) 100%);

        background: -webkit-linear-gradient(45deg, hsla(126, 60%, 62%, 1) 0%, hsla(120, 84%, 29%, 1) 100%);

        filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#64D870", endColorstr="#0C890C", GradientType=1);
        cursor: pointer;
        transition: .3s ease;

    }

    #room-type-accordion .card-room:hover {
        transform: scale(.98);
    }

    #room-type-accordion .card-body-room {
        padding: 4px 18px;
    }

    .card-body-room h2 {
        font-size: 3rem;
        color: white;
        /* opacity: .8; */

    }

    .card-body-room p {
        font-size: 1.5rem;
        color: white;
        /* opacity: .8; */
    }

    .card-body-room svg {
        position: absolute;
        color: white;
        width: 6rem;
        top: .5rem;
        right: .5rem;
        opacity: .9;
    }
</style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <div class="accordion" id="room-type-accordion">
                @foreach ($room_types as $roomtype)
                <div class="card">
                    <div class="card-header" id="{{$roomtype->room_type}}">
                        <h5 class="mb-0">
                            {{-- Tipe Kamar --}}
                            <button class="btn btn-secondary text-left" type="button" data-toggle="collapse"
                                data-target="#{{$roomtype->room_type}}{{$roomtype->id}}" aria-expanded="true"
                                aria-controls="{{$roomtype->room_type}}{{$roomtype->id}}">
                                {{ $roomtype->room_type }}&nbsp;
                                <span class="badge badge-danger">{{ $roomtype->room->count() }}</span>
                            </button>
                        </h5>
                    </div>

                    <div id="{{$roomtype->room_type}}{{$roomtype->id}}"
                        class="collapse @if($roomtype->id == 1) show @else  @endif"
                        aria-labelledby="{{$roomtype->room_type}}" data-parent="#room-type-accordion">
                        <div class="card-body">

                            <div class="row">
                                @if ($roomtype->room->count() > 0)
                                @foreach ($roomtype->room as $room)
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="card-room" data-room="{{$room->room_name}}">
                                        <div class="card-body-room">
                                            <h2>{{$room->room_name}}</h2>
                                            <p>{{ $roomtype->floor->floor }}</p>
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,7H11V14H3V5H1V20H3V17H21V20H23V11A4,4 0 0,0 19,7M7,13A3,3 0 0,0 10,10A3,3 0 0,0 7,7A3,3 0 0,0 4,10A3,3 0 0,0 7,13Z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="col">
                                    <div class="d-flex justify-content-center ">
                                        <div class="alert alert-danger">Kamar tidak tersedia</div>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#room-type-accordion">
                        <div class="card-body">
                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#room-type-accordion">
                        <div class="card-body">
                            And lastly, the placeholder content for the third and final accordion panel. This panel is
                            hidden by
                            default.
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection
{{-- @section('pagecss')
<style>

</style>
@endsection--}}
@section('pagejs')
<script>
    /*
	* Page Custom Javascript | Jquery codes
	*/

	$(document).ready(function(){
		$("#room-type-accordion").on('click', '.card-room', function(){
            let room_number = parseInt($(this).data("room"));
            
            let url = '{{ route("transaction.checkin", ":room_number") }}';

            window.location.href = url.replace(":room_number",room_number);
        })
	});
</script>

@endsection