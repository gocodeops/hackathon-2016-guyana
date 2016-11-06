<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    User To User Transaction
                </h2>
            </div>

            <div class="well well-lg">
            	<form action="" id="transaction" method="POST" role="form">
	            	<div class="form-group">
						<label for="">Amount</label>
						<input type="text" class="form-control" id="amount" placeholder="10.00" required="">
					</div>

					<div class="form-group">
						<label for="">Sender ID</label>
						<input type="text" class="form-control" id="sender_id" placeholder="AB1324" required="">
					</div>

					<div class="form-group">
						<label for="">Receiver ID</label>
						<input type="text" class="form-control" id="receiver_id" placeholder="AB1324" required="">
					</div>
	            
	            	<button type="submit" class="btn btn-primary">Submit</button>
	            </form>
            </div>
			
				

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
	$('#transaction').submit(function(e) {
		e.preventDefault();

		var sender_id = localStorage.getItem('sender_id');

		$.post('http://gocodeops.com/hackathon_guyana_app/public/new/user_to_user_payment', {
				amount: $('#amount').val(),
				// sender_id: sender_id,
				sender_id: $('#sender_id').val(),
				receiver_id: $('#receiver_id').val()
			}, function(data) {
				if(data == 405) {
					swal({
					    title: "Transaction error!",
					    text: "Please verify the Sender ID or Receiver ID.",
					    type: "warning"
					});
				} else if(data == 403) {
					swal({
					    title: "Transaction error!",
					    text: "Insufficient balance.",
					    type: "warning"
					});
				} else {
					swal({
					    title: "Success!",
					    text: "Transaction has been made!",
					    type: "success"
					});
				}
		});
	});
</script>

