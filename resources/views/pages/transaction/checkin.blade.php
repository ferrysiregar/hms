@extends($layout)
@section('title')
@section('content')

<style>
    .select2-container--bootstrap4 .select2-selection--single {
        height: calc(1.5em + 1.2rem - 2px) !important;
        /* padding: 1.5rem 0; */
        font-size: 19px;
    }
</style>

<section class="page">
    <div class="card-4 bg-light">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="h5 font-weight-bold text-primary mt-2">
                        Check In <span class="h5 font-weight-normal">- Lengkapi Data Checkin</span>
                    </div>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-primary">Tambah Tamu</button>
                </div>
            </div>
        </div>
</section>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <form class="needs-validation " novalidate>
                <div class="form-row">
                    <div class="col-3">
                        <label for="" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">#No.
                            Invoice</label>
                        <input type="text" class="form-control form-control-lg" value="INV-0000001" required>
                        {{-- <div class="card  mt-1" style="width: 100%; background: dodgerblue">
                            <div class="card-body text-white">
                                <h5 class="font-weight-bold text-center">
                                    Deluxe - 101
                                </h5>
                                <hr class="bg-white">
                                <h5>Rp. 250.000,- / Malam</h5>
                                <h5>Dewasa Max -2 Orang</h5>
                                <h5>Anak - anak Max -2 Orang</h5>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-5">
                        <label for="" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Tamu</label>
                        <select class="form-control form-control-lg" name="guest" style="width: 100%;height: 2px;">
                        </select>
                    </div>
                    <div class="col">
                        <label for="" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Dewasa</label>
                        <input type="number" min="1" max="10" class="form-control form-control-lg" required>
                        <div class="invalid-tooltip">
                            Please choose a unique and valid username.
                        </div>
                    </div>
                    <div class="col">
                        <label for="" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Anak -
                            Anak</label>
                        <input type="number" min="1" max="10" class="form-control form-control-lg">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-3" style="position: relative">
                        <div class="alert alert-primary font-weight-bold">NOMOR KAMAR : {{ $room->room_name }}</div>
                        <div class="card"
                            style="width: calc(100% - .75rem); position: absolute; background: dodgerblue">
                            <div class="card-body text-white">
                                <h5 class="font-weight-bold text-center">
                                    {{ $room->room_type->room_type }}
                                </h5>
                                <hr class="bg-white">
                                <h5>Rp. {{ number_format($room->price_sales) }} / Malam</h5>
                                <h5>Dewasa Max -2 Orang</h5>
                                <h5>Anak - anak Max -2 Orang</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-4">
                        <label for="checkin_date" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Tanggal
                            CheckIn</label>
                        <div class="input-group ">
                            <input id="checkin_date" class="form-control form-control-lg datepicker" required=""
                                value="" type="text" name="checkin_date" placeholder="" data-enable-time="false"
                                data-min-date="{{ now() }}" data-max-date="" data-date-format="Y-m-d"
                                data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false"
                                data-mode="single" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="checkin_time" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">jam
                            CheckIn</label>
                        <div class="input-group">
                            <input id="checkin_time" class="form-control form-control-lg" value="{{ date('H:i') }}"
                                readonly="" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="material-icons">access_time</i></span>
                            </div>
                        </div>
                        {{-- <label for="" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Jam</label>
                        <input type="number" min="1" max="10" class="form-control form-control-lg"> --}}
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-6">

                    </div>
                    <div class="col-4">
                        <label for="checkout_date" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">Tanggal
                            CheckOut</label>
                        <div class="input-group ">
                            <input id="checkout_date" class="form-control form-control-lg datepicker" required=""
                                value="" type="text" name="checkout_date" placeholder="" data-enable-time="false"
                                data-min-date="{{ now() }}" data-max-date="" data-date-format="Y-m-d"
                                data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false"
                                data-mode="single" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="checkout_time" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">jam
                            CheckOut</label>
                        <div class="input-group">
                            <input id="checkout_time" class="form-control form-control-lg" value="13:00" readonly="" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="material-icons">access_time</i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col"></div>
                    <div class="col">
                        <label for="checkout_date" class="control-label mb-1 text-uppercase"
                            style="font-weight:bold;font-size:13px">deposit</label>
                        <input type="text" id="deposit" class="form-control form-control-lg">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="col text-right">
            <button class="btn btn-warning">
                <i class="material-icons">date_range</i> TAMBAH ORDER
            </button>
            <button class="btn btn-primary">CHECKIN</button>
            <hr>
        </div>
    </div>
</div>


@endsection

@section('pagejs')
<script>
    /*
         * Page Custom Javascript | Jquery codes
         */
        $("#sidebar").addClass("active");
        $("#main-content").addClass("active");
        $(document).ready(function() {
            $('[name=guest]').select2({
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route('customers.select-option') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }

                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.customer_name} | ${item.phone} | ${item.address}`,
                                    id: item.id
                                }
                            })
                        }
                    },
                    language: "id"
                },
                language: {
                    noResults: function() {
                        return `<button class="btn btn-primary btn-block" onclick="tambahPelanggan()">
                            Tambah Tamu Baru
                            </button>`;
                    }
                },
               
                escapeMarkup: function(markup) {
                    return markup;
                }
            });
        });
</script>

@endsection