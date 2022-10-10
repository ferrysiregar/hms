@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Employee";
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
                        Employee
                    </div>
                </div>
                <div class="col-md-auto " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("employee/add") ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Employee 
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
                    <div id="employee-list-records">
                        <div class="row">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <div class="ajax-page-load-indicator" style="display:none">
                                        <div class="text-center d-flex justify-content-center load-indicator">
                                            <span class="loader mr-3"></span>
                                            <span class="font-weight-bold">Loading...</span>
                                        </div>
                                    </div>
                                    <?php Html::page_bread_crumb("/employee/", $field_name, $field_value); ?>
                                    <table class="table table-hover table-striped table-sm text-left">
                                        <thead class="table-header ">
                                            <tr>
                                                <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                                </label>
                                                </th>
                                                <th class="td-nik" > Nik</th>
                                                <th class="td-name" > Name</th>
                                                <th class="td-department" > Department</th>
                                                <th class="td-job_title" > Job Title</th>
                                                <th class="td-born" > Born</th>
                                                <th class="td-address" > Address</th>
                                                <th class="td-work_start_date" > Work Start Date</th>
                                                <th class="td-contract_status" > Contract Status</th>
                                                <th class="td-salary" > Salary</th>
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
                                                $rec_id = ($data['nik'] ? urlencode($data['nik']) : null);
                                                $counter++;
                                            ?>
                                            <tr>
                                                <td class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['nik'] ?>" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <!--PageComponentStart-->
                                                <td class="td-nik">
                                                    <a href="<?php print_link("employee/view/$data[nik]") ?>"><?php echo $data['nik']; ?></a>
                                                </td>
                                                <td class="td-name">
                                                    <?php echo  $data['name'] ; ?>
                                                </td>
                                                <td class="td-department">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("department/view/$data[department]?subpage=1") ?>">
                                                    <i class="material-icons">visibility</i> <?php echo $data['department_department_name'] ?>
                                                </a>
                                            </td>
                                            <td class="td-job_title">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("job_title/view/$data[job_title]?subpage=1") ?>">
                                                <i class="material-icons">visibility</i> <?php echo $data['job_title_job_title_name'] ?>
                                            </a>
                                        </td>
                                        <td class="td-born">
                                            <?php echo  $data['born'] ; ?>
                                        </td>
                                        <td class="td-address">
                                            <?php echo  $data['address'] ; ?>
                                        </td>
                                        <td class="td-work_start_date">
                                            <?php echo  $data['work_start_date'] ; ?>
                                        </td>
                                        <td class="td-contract_status">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("contract_status/view/$data[contract_status]?subpage=1") ?>">
                                            <i class="material-icons">visibility</i> <?php echo $data['contract_status_contract_status_name'] ?>
                                        </a>
                                    </td>
                                    <td class="td-salary">
                                        <?php echo  $data['salary'] ; ?>
                                    </td>
                                    <!--PageComponentEnd-->
                                    <td class="td-btn">
                                        <a class="mx-1 btn btn-sm btn-primary has-tooltip "   title="Lihat" href="<?php print_link("employee/view/$rec_id"); ?>">
                                        <i class="material-icons">visibility</i> View
                                    </a>
                                    <a class="mx-1 btn btn-sm btn-success has-tooltip "   title="Ubah" href="<?php print_link("employee/edit/$rec_id"); ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="mx-1 btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Yakin Mau Hapus ?...." data-display-style="modal" title="Hapus" href="<?php print_link("employee/delete/$rec_id"); ?>">
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("employee/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
