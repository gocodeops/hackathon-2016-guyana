<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Administrators
                </h2>
            </div>

			<div class="panel-body">
			<div class="form-horizontal">

				<div class="form-group"><label class="col-sm-2 control-label">ID</label>
                	<div class="col-sm-10"><input id="id" class="form-control" type="text"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Firstname</label>
                    <div class="col-sm-10"><input id="firstname" class="form-control" type="text"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Lastname</label>
                    <div class="col-sm-10"><input id="lastname" class="form-control" type="text"></div>
                </div>

				<div class="form-group"><label class="col-sm-2 control-label">District</label>
                    <div class="col-sm-10"><input id="district" class="form-control" type="text"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Street Address</label>
                    <div class="col-sm-10"><input id="address" class="form-control" type="text"></div>
                </div>

                	<div class="hr-line-dashed"></div>

                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <a href="admins.php" class="btn btn-default" type="submit">Cancel</a>
                        <button class="btn btn-primary" id="submit">Save changes</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
	$('#submit').click(function() {

	});
</script>