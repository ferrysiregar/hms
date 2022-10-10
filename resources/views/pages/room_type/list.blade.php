@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Room Type";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Room Type
                    </div>
                </div>
                <div class="col-md-auto " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("room_type/add") ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Room Type 
                </a>
            </div>
            <div class="col-md-3 " >
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 comp-grid" >
                <?php Html::display_page_errors($errors); ?>
                <div  class=" page-content" >
                    <div id="room_type-list-records">
                        <div class="row">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <div class="ajax-page-load-indicator" style="display:none">
                                        <div class="text-center d-flex justify-content-center load-indicator">
                                            <span class="loader mr-3"></span>
                                            <span class="font-weight-bold">Loading...</span>
                                        </div>
                                    </div>
                                    <?php Html::page_bread_crumb("/room_type/", $field_name, $field_value); ?>
                                    <table class="table table-hover table-striped table-sm text-left">
                                        <thead class="table-header ">
                                            <tr>
                                                <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                                </label>
                                                </th>
                                                <th class="td-id" > Id</th>
                                                <th class="td-room_type" > Room Type</th>
                                                <th class="td-floor_id" > Floor Id</th>
                                                <th class="td-desc_type" > Desc Type</th>
                                                <th class="td-" > </th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            if($total_records){
                                        ?>
                                        <tbody class="page-data">
                                            <!--record-->
                                            <?php
                                                $counter = 0;
                                                foreach($records as $data){
                                                $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                                $counter++;
                                            ?>
                                            <tr>
                                                <td class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <!--PageComponentStart-->
                                                <td class="td-id">
                                                    <a href="<?php print_link("room_type/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                                </td>
                                                <td class="td-room_type">
                                                    <?php echo  $data['room_type'] ; ?>
                                                </td>
                                                <td class="td-floor_id">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("room_floor/view/$data[floor_id]?subpage=1") ?>">
                                                    <i class="material-icons">visibility</i> <?php echo $data['room_floor_floor'] ?>
                                                </a>
                                            </td>
                                            <td class="td-desc_type">
                                                <?php echo  $data['desc_type'] ; ?>
                                            </td>
                                            <td class="td-masterdetailbtn">
                                                <a data-page-id="room_type-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("room_type/masterdetail/$data[id]"); ?>">
                                                <i class="material-icons">add</i> 
                                            </a>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <a class="mx-1 btn btn-sm btn-primary has-tooltip "   title="Lihat" href="<?php print_link("room_type/view/$rec_id"); ?>">
                                            <i class="material-icons">visibility</i> View
                                        </a>
                                        <a class="mx-1 btn btn-sm btn-success has-tooltip "   title="Ubah" href="<?php print_link("room_type/edit/$rec_id"); ?>">
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                    <a class="mx-1 btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Yakin Mau Hapus ?...." data-display-style="modal" title="Hapus" href="<?php print_link("room_type/delete/$rec_id"); ?>">
                                    <i class="material-icons">clear</i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!--endrecord-->
                    </tbody>
                    <tbody class="search-data"></tbody>
                    <?php
                        }
                        else{
                    ?>
                    <tbody class="page-data">
                        <tr>
                            <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                <i class="material-icons">block</i> Tidak Ada Data
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <?php
                if($show_footer){
            ?>
            <div class="">
                <div class="row justify-content-center">    
                    <div class="col-md-auto justify-content-center">    
                        <div class="p-3 d-flex justify-content-between">    
                            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("room_type/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                            <i class="material-icons">clear</i> Delete Selected
                            </button>
                        </div>
                    </div>
                    <div class="col">   
                        <?php
                            if($show_pagination == true){
                            $pager = new Pagination($total_records, $record_count);
                            $pager->show_page_count = false;
                            $pager->show_record_count = true;
                            $pager->show_page_limit =false;
                            $pager->limit = $limit;
                            $pager->show_page_number_list = true;
                            $pager->pager_link_range=5;
                            $pager->ajax_page = true;
                            $pager->render();
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <!-- Detail Page Column -->
        <?php if(!request()->has('subpage')){ ?>
        <div class="col-12">
            <div class=" ">
                <div id="room_type-detail-page" class="master-detail-page"></div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
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
