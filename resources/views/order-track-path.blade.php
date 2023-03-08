<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>مسار السائق للطلب</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" >
	<style type="text/css">
		.map-container{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
		}
		.map-container iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
		}
		#slide-out{
			height: 40px;
		}
	</style>
</head>
<body>
<div class="fixed-sn white-skin">

    <!--Main Navigation-->
    <header>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
            <!-- Logo -->




            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Driver Order Track</p>
            </div>


        </nav>
        <!-- /.Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class=" m-0 p-0">
        <div class="container-fluid m-0 p-0">

 <!--Google map-->
<div id="map-container" class="z-depth-1-half map-container" style="height: 500px">

</div>

        </div>
    </main>
    <!--Main layout-->


      </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

	<script  src="https://maps.google.com/maps/api/js?key=AIzaSyCdHpbbpzOKOZa21DMC3mTdNBG34k6q80Q&v=3"></script>

	<script type="text/javascript">
		var center_map = {lat: 	30.0444 , lng:  31.2357 };
        var map = new google.maps.Map(document.getElementById('map-container'), {zoom: 16 , center: center_map});

        var markersArr = [];
         // Function for adding a marker to the page.
    	function addMarker(location) {
		    marker = new google.maps.Marker({
		        position: location,
		        map: map,
                icon:'https://stagingapis.productivefamilies.com/pngegg1.png'
			});
			markersArr.push(marker);
			map.setCenter(location);

		}

		//clear markers
		function clearOverlays() {
			for (var i = 0; i < markersArr.length; i++ ) {
				markersArr[i].setMap(null);
			}
			markersArr.length = 0;
		}

	</script>

	<script>

        @foreach($points as $point)
            @php $json = json_decode($point); @endphp
            var pointStr = "{{$json->message}}"
            var point = pointStr.split(',');
            addMarker({lat: Number(point[0]), lng: Number(point[1])});
        @endforeach

        </script>
</body>
</html>
