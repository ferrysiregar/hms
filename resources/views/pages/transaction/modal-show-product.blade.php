<x-modal-sidebar id="modal-order">
    <x-slot name="title">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#food-collapse"
            aria-expanded="false" aria-controls="food-collapse">Makanan</button>
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#drink-collapse"
            aria-expanded="false" aria-controls="drink-collapse">Minuman</button>
        <button class="btn btn-info">Layanan</button>
    </x-slot>


    <div class="collapse show" id="food-collapse">
        <div class="row">
            @for($i=1;$i<10;$i++) <div class="col-6">
                <div class="card mb-3">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2021/04/22/5-makanan-enak-dari-indonesia-dan-malaysia-yang-terkenal-enak-5.jpeg?w=700&q=90"
                        class="card-img-top" alt="...">
                    <div class="card-body p-2">
                        <h5 class="card-title font-weight-bold">Nasi Goreng Spesail</h5>
                        <p class="card-text">
                            Rp. 12.500 / Porsi
                        </p>
                        <button class="btn btn-danger btn-block select-item">PILIH</button>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>

</x-modal-sidebar>