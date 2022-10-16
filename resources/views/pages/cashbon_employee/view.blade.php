@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Cashbon Employee Details";
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
                        Cashbon Employee Details
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
                                        <div class="border-top td-date p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Date</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['date'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-employee_name p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Employee Name</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['employee_name'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-salary_employee p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Salary Employee</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['salary_employee'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-cashbon_value p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Cashbon Value</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['cashbon_value'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-calc_month_payment p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Calc Month Payment</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['calc_month_payment'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-payment_per_month p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Payment Per Month</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['payment_per_month'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-cashbon_description p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Cashbon Description</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['cashbon_description'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--PageComponentEnd-->
                                        <div class="d-flex q-col-gutter-xs justify-btween">
                                            <a class="mx-1 btn btn-sm btn-success has-tooltip "   title="Ubah" href="<?php print_link("cashbon_employee/edit/$rec_id"); ?>">
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <a class="mx-1 btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Yakin Mau Hapus ?...." data-display-style="modal" title="Ubah" href="<?php print_link("cashbon_employee/delete/$rec_id"); ?>">
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
