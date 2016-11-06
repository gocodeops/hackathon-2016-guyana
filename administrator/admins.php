<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
	
	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Admins overview
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
			                        <th>Control access</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Admins  -->

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
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/view_admins', function(data) {
		data = $.parseJSON(data);
		
		$.each(data, function(i, value) {
			var user_type = data[i].user_type;;
			var access = '';

			if(user_type == 'user') {
				access = '<button class-"btn btn-xs button-success">Set as admin</button>';
			} else if(user_type == 'admin') {
				access = '<button class-"btn btn-xs button-warning">Set as user</button>';
			}

			var content = '\
				<tr>\
                    <td>'+data[i].id+'</td>\
                    <td>'+data[i].firstname+'</td>\
                    <td>'+data[i].lastname+'</td>\
                    <td>'+data[i].district+'</td>\
                    <td>'+data[i].address+'</td>\
                    <td>'+data[i].address+'</td>\
                </tr>\
			';

			$('tbody').append(content);
			
		});
	});
</script>