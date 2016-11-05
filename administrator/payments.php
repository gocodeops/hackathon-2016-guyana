<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Payments overview
            </h2>
        </div>
    </div>


    <div class="modal fade" id="modal-id">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Make payment</h4>
    			</div>
    			<div class="modal-body">
    				
					<div class="form-group">
						<label for="">Amount</label>
						<input type="text" class="form-control" id="amount" placeholder="10.00">
					</div>

    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="button" id="make_payment" class="btn btn-primary">Proceed</button>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="content animate-panel">
        <div class="row">
		    <div class="col-lg-12" style="">

		    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Make payment</a>
		    	<br><br>

		        <div class="hpanel">
		            <div class="panel-body">
		                <div class="table-responsive">
			                <table class="table table-bordered table-striped" cellspacing="1" cellpadding="1">
			                    <thead>
			                    <tr>
			                        <th>Amount</th>
			                        <th>Sender</th>
			                        <th>Receiver</th>
			                        <th>Date</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Payments  -->

			                    </tbody>
			                </table>
						</div>

		            </div>
		        </div> <!-- hpanel -->
		    </div>
		</div> <!-- Row -->
    </div> <!-- content animate-panel -->
</div> <!-- Wrapper -->

<?php include 'footer.php'; ?>

<script type="text/javascript">
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/payments', function(data) {
		data = $.parseJSON(data);

		$.each(data, function(i, value) {

			var content = '\
				<tr>\
                    <td>'+data[i].amount+'</td>\
                    <td>'+data[i].sender_id+'</td>\
                    <td>'+data[i].receiver_id+'</td>\
                    <td>'+data[i].date+'</td>\
                </tr>\
			';

			$('tbody').append(content);

		});
	});

	
	//Make payment
 //    swal({
	//     title: "Success!",
	//     text: "Payment has been made.",
	//     type: "success"
	// });
</script>