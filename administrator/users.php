<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Users overview
            </h2>
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
		    <div class="col-lg-12" style="">
		        <div class="hpanel">
		            <div class="panel-body">
		                <div class="table-responsive">
			                <table class="table table-bordered table-striped" cellspacing="1" cellpadding="1">
			                    <thead>
			                    <tr>
			                        <th>ID</th>
			                        <th>Firstname</th>
			                        <th>Lastname</th>
			                        <th>District</th>
			                        <th>Street Address</th>
			                        <th>Active</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Users  -->

			                    </tbody>
			                </table>
						</div>

		            </div>
		            <div class="panel-footer">
		                1 out of 1 active users
		            </div>
		        </div> <!-- hpanel -->
		    </div>
		</div> <!-- Row -->
    </div> <!-- content animate-panel -->
</div> <!-- Wrapper -->

<?php include 'footer.php'; ?>

<script type="text/javascript">
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/users', function(data) {
		data = $.parseJSON(data);

		$.each(data, function(i, value) {
			var active = data[i].active;
			var active_status = '';
			var active_count = 0;
			var total_users = data.length;

			if(active == 1) {
				active_status = '<span class="label label-success">Active</span>';
			} else if(active == 0) {
				active_status = '<span class="label label-warning">Not active</span>';
			}

			if(active == 1) {
				active_count++;
			}

			var content = '\
				<tr>\
                    <td>'+data[i].id+'</td>\
                    <td>'+data[i].firstname+'</td>\
                    <td>'+data[i].lastname+'</td>\
                    <td>'+data[i].district+'</td>\
                    <td>'+data[i].address+'</td>\
                    <td>'+active_status+'</td>\
                </tr>\
			';

			$('tbody').append(content);
			$('.panel-footer').html(active_count+' out of '+total_users+' active users');

		});
	});
</script>