@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Details Booking Details";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Details Booking Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <?php
                            $counter = 0;
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                            $counter++;
                        ?>
                        <div id="page-main-content" class="">
                            <div class="row">
                                <div class="col">
                                    <div class="ajax-page-load-indicator" style="display:none">
                                        <div class="text-center d-flex justify-content-center load-indicator">
                                            <span class="loader mr-3"></span>
                                            <span class="font-weight-bold">Loading...</span>
                                        </div>
                                    </div>
                                    <!-- Table Body Start -->
                                    <div class="page-data">
                                        <!--PageComponentStart-->
                                        <div class="border-top td-code_details_booking p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Code Details Booking</div>
                                                    <div class="font-weight-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("booking/view/$data[code_details_booking]?subpage=1") ?>">
                                                        <i class="material-icons">visibility</i> <?php echo "Booking Detail" ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-room_id p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Room Id</div>
                                                <div class="font-weight-bold">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("room/view/$data[room_id]?subpage=1") ?>">
                                                    <i class="material-icons">visibility</i> <?php echo "Room Detail" ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-price p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Price</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['price'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-qty p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Qty</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['qty'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-total p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Total</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['total'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PageComponentEnd-->
                                <div class="d-flex q-col-gutter-xs justify-btween">
                                    <a class="mx-1 btn btn-sm btn-success has-tooltip "   title="Ubah" href="<?php print_link("details_booking/edit/$rec_id"); ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="mx-1 btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Yakin Mau Hapus ?...." data-display-style="modal" title="Ubah" href="<?php print_link("details_booking/delete/$rec_id"); ?>">
                                <i class="material-icons">clear</i> Delete
                            </a>
                        </div>
                    </div>
                    <!-- Table Body End -->
                </div>
            </div>
        </div>
        <?php
            }
            else{
        ?>
        <!-- Empty Record Message -->
        <div class="text-muted p-3">
            <i class="material-icons">block</i> No Record Found
        </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
</div>
</div>
</section>
@endsection
@section('pagecss')
<style>

</style>
@endsection
@section('pagejs')
<script>
	/*
	* Page Custom Javascript | Jquery codes
	*/

	//$(document).ready(function(){
	//	
	//});
</script>

@endsection
