@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Booking";
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
                        Booking
                    </div>
                </div>
                <div class="col-md-auto " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("booking/add") ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Booking 
                </a>
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
                @include("pages.booking-booking_calendar-page-calendar")
                <div  class=" page-content" >
                    <div id="booking-booking_calendar-records">
                        <div class="row">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <div class="ajax-page-load-indicator" style="display:none">
                                        <div class="text-center d-flex justify-content-center load-indicator">
                                            <span class="loader mr-3"></span>
                                            <span class="font-weight-bold">Loading...</span>
                                        </div>
                                    </div>
                                    <?php Html::page_bread_crumb("/booking/booking_calendar", $field_name, $field_value); ?>
                                    <table class="table table-hover table-striped table-sm text-left">
                                        <thead class="table-header ">
                                            <tr>
                                                <th class="td-code_booking" > Booking Code</th>
                                                <th class="td-customers_id" > Customers</th>
                                                <th class="td-agent_id" > Agent</th>
                                                <th class="td-checkin_date" > Checkin Date</th>
                                                <th class="td-checkin_time" > Checkin Time</th>
                                                <th class="td-checkout_date" > Checkout Date</th>
                                                <th class="td-checkout_time" > Checkout Time</th>
                                                <th class="td-payment_status_id" > Payment Status</th>
                                                <th class="td-room_id" > Room</th>
                                                <th class="td-price" > Price</th>
                                                <th class="td-qty" > Qty</th>
                                                <th class="td-total" > Total</th>
                                                <th class="td-" > </th>
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
                                                $rec_id = ($data['code_booking'] ? urlencode($data['code_booking']) : null);
                                                $counter++;
                                            ?>
                                            <tr>
                                                <!--PageComponentStart-->
                                                <td class="td-code_booking">
                                                    <a href="<?php print_link("booking/view/$data[code_booking]") ?>"><?php echo $data['code_booking']; ?></a>
                                                </td>
                                                <td class="td-customers_id">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("customers/view/$data[customers_id]?subpage=1") ?>">
                                                    <i class="material-icons">visibility</i> <?php echo $data['customers_customer_name'] ?>
                                                </a>
                                            </td>
                                            <td class="td-agent_id">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("agent/view/$data[agent_id]?subpage=1") ?>">
                                                <i class="material-icons">visibility</i> <?php echo $data['agent_agent'] ?>
                                            </a>
                                        </td>
                                        <td class="td-checkin_date">
                                            <?php echo  $data['checkin_date'] ; ?>
                                        </td>
                                        <td class="td-checkin_time">
                                            <?php echo  $data['checkin_time'] ; ?>
                                        </td>
                                        <td class="td-checkout_date">
                                            <?php echo  $data['checkout_date'] ; ?>
                                        </td>
                                        <td class="td-checkout_time">
                                            <?php echo  $data['checkout_time'] ; ?>
                                        </td>
                                        <td class="td-payment_status_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("payment_status/view/$data[payment_status_id]?subpage=1") ?>">
                                            <i class="material-icons">visibility</i> <?php echo $data['payment_status_payment_status'] ?>
                                        </a>
                                    </td>
                                    <td class="td-details_booking_room_id">
                                        <?php echo  $data['details_booking_room_id'] ; ?>
                                    </td>
                                    <td class="td-details_booking_price">
                                        <?php echo  $data['details_booking_price'] ; ?>
                                    </td>
                                    <td class="td-details_booking_qty">
                                        <?php echo  $data['details_booking_qty'] ; ?>
                                    </td>
                                    <td class="td-details_booking_total">
                                        <?php echo  $data['details_booking_total'] ; ?>
                                    </td>
                                    <td class="td-masterdetailbtn">
                                        <a data-page-id="booking-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("booking/masterdetail/$data[code_booking]"); ?>">
                                        <i class="material-icons">add</i> 
                                    </a>
                                </td>
                                <!--PageComponentEnd-->
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
                    <div id="booking-detail-page" class="master-detail-page"></div>
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
