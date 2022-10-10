    <?php
        $rec_id = $masterRecordId ?? null;
        $page_id = "tab-".random_str(6);
    ?>
    <div class="master-detail-page">
        <div class="h5 pa-3 mb-3">Room Records</div>
        <div class="card-header p-0 pt-2 px-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" href="#details_booking_<?php echo $page_id ?>" class="nav-link active">
                    Room Details Booking
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="details_booking_<?php echo $page_id ?>" role="tabpanel">
        <div class=" ">
            <?php
                $params = ['show_header' => false]; //new query param
                $query = array_merge(request()->query(), $params);
                $queryParams = http_build_query($query);
                $url = url("details_booking/index/room_id/$rec_id?$queryParams");
            ?>
            <div class="ajax-inline-page" data-url="{{ $url }}" >
                <div class="ajax-page-load-indicator">
                    <div class="text-center d-flex justify-content-center load-indicator">
                        <span class="loader mr-3"></span>
                        <span class="font-weight-bold">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class=" ">
            <?php
                $params = ['room_id' => $rec_id]; //new query param
                $query = array_merge(request()->query(), $params);
                $queryParams = http_build_query($query);
                $url = url("details_booking/add?$queryParams");
            ?>
            <div class="ajax-inline-page" data-url="{{ $url }}" >
                <div class="ajax-page-load-indicator">
                    <div class="text-center d-flex justify-content-center load-indicator">
                        <span class="loader mr-3"></span>
                        <span class="font-weight-bold">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
