<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Merchants overview
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
			                        <th>Merchant name</th>
			                        <th>Location</th>
                                    <th>Code</th>
			                        <th>Action</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Merchants  -->

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
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/merchants', function(data) {
		data = $.parseJSON(data);

		$.each(data, function(i, value) {

			var content = '\
				<tr>\
                    <td>'+data[i].name+'</td>\
                    <td>'+data[i].location+'</td>\
                    <td>'+data[i].code+'</td>\
                    <td><a href="#" class="btn btn-xs btn-primary    ">Show transactions</a></td>\
                </tr>\
			';

			$('tbody').append(content);

		});
	});
</script>