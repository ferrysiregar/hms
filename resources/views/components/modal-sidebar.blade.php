<style>
    .modal.left .modal-dialog {
        position: fixed;
        right: 0;
        margin: auto;
        width: 400px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body {
        background-color: #EAEAEA;
    }

    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }

    .modal.right.fade .modal-dialog {
        left: -320px;
        -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
        -o-transition: opacity 0.3s linear, left 0.3s ease-out;
        transition: opacity 0.3s linear, left 0.3s ease-out;
    }

    .modal.right.fade.show .modal-dialog {
        right: 0;
    }

    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
    }

    .modal-header {
        border-bottom-color: #eeeeee;
        background-color: #fafafa;
    }

    /* .demo {
        padding-top: 60px;
        padding-bottom: 110px;
    } */
</style>

<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">

<div class="modal left animate__animated animate__slideInRight" id="{{ $id }}" data-backdrop="static"
    data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{ $title }}

            </div>
            <div class="modal-body">

                {{ $slot }}
            </div>


            <div class="modal-footer">
                @if ($footer)
                {{ $footer }}

                @else
                <button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Tutup</button>
                @endif
            </div>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        // $("#modal-order").modal("show");

        $(".modal-body").overlayScrollbars({
            sizeAutoCapable: true,
            scrollbars: {
                visibility: "auto",
                autoHide: "l",
                autoHideDelay: 100,
                dragScrolling: true,
                clickScrolling: false,
                touchSupport: true,
                snapHandle: false
            },
        });
    })
</script>