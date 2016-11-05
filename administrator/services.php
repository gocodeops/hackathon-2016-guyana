<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Services overview
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
			                        <th>Service name</th>
			                        <th>Image link</th>
			                        <th>Location</th>
			                        <th>Code</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Services  -->

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
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/services', function(data) {
		data = $.parseJSON(data);

		$.each(data, function(i, value) {

			var content = '\
				<tr>\
                    <td>'+data[i].name+'</td>\
                    <td>'+data[i].image_link+'</td>\
                    <td>'+data[i].location+'</td>\
                    <td>'+data[i].code+'</td>\
                </tr>\
			';

			$('tbody').append(content);

		});
	});
</script>