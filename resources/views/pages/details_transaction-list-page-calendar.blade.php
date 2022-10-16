	<div class="card-4 mb-3" >
		@section('plugins')
			<link rel="stylesheet" href="{{ asset('css/fullcalendar-main.min.css') }}" />
			<script type="text/javascript" src="{{ asset('js/fullcalendar-main.min.js') }}"></script>
		@endsection
		<?php
			$events = [];
		if(!empty($records)){
			foreach ($records as $data) {
				$id = $data['id'];
				$title = $data['code_details_transaction'];
				$start = ($data['checkin_date'] ? $data['checkin_date'] : date_now());
				if($data['checkout_date']){
					$start .= " " . $data['checkout_date'];
				}
		$end = ($data['checkin_time'] ? $data['checkin_time'] : date_now());
				if($data['']){
					$end .= " " . $data[''];
				}
		$color = ($data['code_details_transaction'] ? $data['code_details_transaction'] : null);
				$events[] = [
					'id' => $id,
					'title' => $title,
					'start' => $start,
					'end' => $end, 
					'color' => $color, 
					'textColor' => '',
					'className' => 'p-1 cursor-pointer',
				];
			}
		}
		?>
		<script>
			var calendar;
			document.addEventListener('DOMContentLoaded', function() {
				var calendarEl = document.getElementById('calendar');
				calendar = new FullCalendar.Calendar(calendarEl, {
					initialView: 'dayGridMonth',
					headerToolbar: {
						center: 'timeGridWeek,dayGridMonth,listWeek',
						right: 'today,prev,next',
					},
					height: "80vh",
					selectable: true,
					events: <?php echo json_encode($events); ?>,
					eventClick: function(info) {
						var pageUrl = "/details_transaction/view/" + info.event.id;
						var modal = $('#main-page-modal');
						modal.modal({show:true});
						modal.find('.modal-body').html(loadingIndicator).load(pageUrl, function(responseText, status, req){
							if(status == 'error'){
								$(this).html(responseText);
							}
							initPlugins();
						});
					},
				});
				calendar.render();
			});
		</script>
		<div id="calendar"></div>
	</div>
