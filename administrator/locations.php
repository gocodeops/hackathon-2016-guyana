<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                Show
            </div>
        </div>
    </div>

    <div class="normalheader transition animated fadeIn">
	    <div class="hpanel">
	        <div class="panel-body">

	           <!--  <h2 class="font-light m-b-xs">
	                Tables design
	            </h2>
	            <small>Examples of various designs of tables.</small> -->

	            <div id="map" style="width:100%;height:500px"></div>

	        </div>
	    </div>
	</div>

</div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2),
    zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

<?php include 'footer.php'; ?>