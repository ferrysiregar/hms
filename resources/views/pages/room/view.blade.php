@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Room Details";
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
                        Room Details
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
                                        <div class="border-top td-id p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Id</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-kode_room p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Kode Room</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['kode_room'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-room_name p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Room Name</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['room_name'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-room_type_id p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Room Type Id</div>
                                                    <div class="font-weight-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("room_type/view/$data[room_type_id]?subpage=1") ?>">
                                                        <i class="material-icons">visibility</i> <?php echo "Room Type Detail" ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-room_facilities_id p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Room Facilities Id</div>
                                                <div class="font-weight-bold">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("room_facilities/view/$data[room_facilities_id]?subpage=1") ?>">
                                                    <i class="material-icons">visibility</i> <?php echo "Room Facilities Detail" ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-price_basic p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Price Basic</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['price_basic'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-price_sales p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Price Sales</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['price_sales'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-status_room_id p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Status Room Id</div>
                                            <div class="font-weight-bold">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("status_room/view/$data[status_room_id]?subpage=1") ?>">
                                                <i class="material-icons">visibility</i> <?php echo "Status Room Detail" ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top td-photo_room_id p-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-muted"> Photo Room Id</div>
                                        <div class="font-weight-bold">
                                            <?php 
                                                Html :: page_img($data['photo_room_id'],200,200, "", "", 1); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top td-adult p-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-muted"> Adult</div>
                                        <div class="font-weight-bold">
                                            <?php echo  $data['adult'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top td-child p-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-muted"> Child</div>
                                        <div class="font-weight-bold">
                                            <?php echo  $data['child'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PageComponentEnd-->
                            <div class="d-flex q-col-gutter-xs justify-btween">
                                <a class="mx-1 btn btn-sm btn-success has-tooltip "   title="Ubah" href="<?php print_link("room/edit/$rec_id"); ?>">
                                <i class="material-icons">edit</i> Edit
                            </a>
                            <a class="mx-1 btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Yakin Mau Hapus ?...." data-display-style="modal" title="Ubah" href="<?php print_link("room/delete/$rec_id"); ?>">
                            <i class="material-icons">clear</i> Delete
                        </a>
                    </div>
                </div>
                <!-- Table Body End -->
            </div>
            <!-- Detail Page Column -->
            <?php if(!request()->has('subpage')){ ?>
            <div class="col-12">
                <div class="my-3 ">
                    @include("pages.room.detail-pages", ["masterRecordId" => $rec_id])
                </div>
            </div>
            <?php } ?>
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
