@extends('layouts.app')
@section('content')



<div class="nd_options_container nd_options_clearfix">


    <!--START all content-->
    <div class>

        <!--post-->
        <div style="float:left; width:100%;" id="post-5695" class="post-5695 page type-page status-publish hentry">
            <!--start content-->
                    <div data-elementor-type="wp-page" data-elementor-id="5695" class="elementor elementor-5695" data-elementor-settings="[]">


<style type="text/css">
* {box-sizing: border-box}



/* Style tab links */
.tablink {
background-color: #444444;
color: #969696;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 14px;
font-size: 15px;
width: 20%;
}

.tablink:hover {
background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
color: lightgrey;
display: none;
padding: 80px 15px;
height: 100%;
}

#Dashboard {background-color:white;}
#Edit Profile {background-color: white;}
#Change Password {background-color: white;}
#Reviews {background-color: white;}
#My Booking {background-color: white;}

.paddingArea1{
width: 100%;
padding-top: 20px;
padding-bottom: 20px}

</style>



<button class="tablink" onclick="openPage('Dashboard', this, 'white')">Dashboard</button>
<button class="tablink" onclick="openPage('Edit Profile', this, 'white')" id="defaultOpen">Edit Profile</button>
<button class="tablink" onclick="openPage('Change Password', this, 'white')">Change Password</button>
<button class="tablink" onclick="openPage('Reviews', this, 'white')">Reviews</button>
<button class="tablink" onclick="openPage('My Booking', this, 'white')">My Booking</button>

<div id="Dashboard" class="tabcontent">


         <div class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_15 nd_booking_width_100_percentage_responsive">

<div class="nd_booking_section  nd_booking_border_1_solid_grey nd_booking_padding_20 nd_booking_box_sizing_border_box">

  <h3 style="width: 300px; font-size: 24px; color:#5c5c5c; font-weight:bold;">My Profile</h3>
<div class="paddingArea1"></div>
<div class="paddingArea1"></div>

<div class="row">
<div class="col-xs-2">
<span style="font-family: Roboto,sans-serif; width: 300px; font-size: 18px; color:#5c5c5c; font-weight:bold;">Name:</span>
</div>
<div class="col-xs-10">
<span style="width: 300px; font-size: 16px; color:#5c5c5c;">{{auth()->user()->name}}</span>
</div>
</div>
<div class="paddingArea1"></div>

<div class="row">
<div class="col-xs-2">
<span style="font-family: Roboto,sans-serif; width: 300px; font-size: 18px; color:#5c5c5c; font-weight:bold;">Phone:</span>
</div>
<div class="col-xs-10">
<span style="width: 300px; font-size: 16px;  color:#5c5c5c;">{{auth()->user()->phone}}</span>
</div>
</div>
<div class="paddingArea1"></div>

<div class="row">
<div class="col-xs-2">
<span style="font-family: Roboto,sans-serif; width: 300px; font-size: 18px; color:#5c5c5c; font-weight:bold;">Email:</span>
</div>
<div class="col-xs-10">
<span style="width: 300px; font-size: 16px; color:#5c5c5c;">{{auth()->user()->email}}</span>
</div>
</div>
<div class="paddingArea1"></div>


{{-- <div class="row">
<div class="col-xs-2">
<span style="font-family: Roboto,sans-serif; width: 300px; font-size: 18px; color:#5c5c5c; font-weight:bold;">Country:</span>
</div>
<div class="col-xs-10">
<span style="width: 300px; font-size: 16px; color:#5c5c5c;">Saudi Arabia</span>
</div>
</div> --}}


      </div>



      </div>
                        </div>



<div id="Edit Profile" class="tabcontent">
<div class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_15 nd_booking_width_100_percentage_responsive">

        <div class="nd_booking_section  nd_booking_border_1_solid_grey nd_booking_padding_20 nd_booking_box_sizing_border_box">
            @include('admin.includes.messages')
               <form  id="nd_booking_shortcode_account_login_form" action="{{route('profile.update')}}" method="post">
                @csrf
                <p>
                   <label class="nd_booking_section nd_booking_margin_top_20">Name</label>
                   <input type="text" name="name" class="input" value='{{auth()->user()->name}}' size="20">
                 </p>



                <p>
                  <label class="nd_booking_section nd_booking_margin_top_20">Email</label>
                  <input type="text" name="email" class="input" value='{{auth()->user()->email}}' size="20" >
                </p>
                <p>
                  <label class="nd_booking_section nd_booking_margin_top_20">Phone</label>
                  <input type="text" name="phone" class="input" value='{{auth()->user()->phone}}' size="20">
                </p>




                <input   class="nd_booking_section nd_booking_margin_top_20" type="submit" name="submit" value="Save Changes">
            </form>

        </div>


      </div>
</div>

<div id="Change Password" class="tabcontent">
<div class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_15 nd_booking_width_100_percentage_responsive">
<div class="nd_booking_section  nd_booking_border_1_solid_grey nd_booking_padding_20 nd_booking_box_sizing_border_box">

               <form  id="nd_booking_shortcode_account_login_form" action="{{route('change.password')}}" method="post">
                @csrf
                   <p>

                  <label class="nd_booking_section nd_booking_margin_top_20">Old Password*</label>
                  <input type="text" name="current-password" class="input" value size="20">
                </p>
                <p>
                  <label class="nd_booking_section nd_booking_margin_top_20">New Password*</label>
                  <input type="password" name="new-password" class="input" value size="20">
                </p>
                <p>
                  <label class="nd_booking_section nd_booking_margin_top_20">Confirm Password*</label>
                  <input type="text" name="new-password_confirmation" class="input" value size="20">
                </p>



                <input   class="nd_booking_section nd_booking_margin_top_20" type="submit" name="submit" value="Update Password">
            </form>

        </div>
</div>
                        </div>

<div id="Reviews" class="tabcontent">

 <div class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_15 nd_booking_width_100_percentage_responsive">

<div class="nd_booking_section  nd_booking_border_1_solid_grey nd_booking_padding_20 nd_booking_box_sizing_border_box">

<section class="section" id="section-1">
    <h2>Add Your Review</h2>

         <div class="paddingArea1"></div>


    <form class="form-1" action="{{route('add.review')}}" method='post'>
        @csrf


        <label for="glsr-custom-options" tyle="pointer-events:none;">Guest reviews: </label>

        <div class="form-field">
            <select id="glsr-custom-options" class="star-rating" data-options='{"clearable":false, "tooltip":false}' name='overall'>
                <option value="">Select a rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
                         <div class="paddingArea1"></div>

          <h2>Categories:</h2>
                         <div class="paddingArea1"></div>


        <label for="glsr-ltr" style="pointer-events: none;">Room Service:</label>
        <div class="form-field">
            <select id="glsr-ltr" class="star-rating" name='room_service'>
                <option value="">Select a rating</option>
                <option value="5">Fantastic</option>
                <option value="4">Great</option>
                <option value="3">Good</option>
                <option value="2">Poor</option>
                <option value="1">Terrible</option>
            </select>
        </div>

           <label for="glsr-rtl" style="pointer-events: none;">Staff:</label>
        <div class="form-field">
            <select id="glsr-rtl" class="star-rating-old" name='staff'>
                <option value="">Select a rating</option>
                <option value="5">Fantastic</option>
                <option value="4">Great</option>
                <option value="3">Good</option>
                <option value="2">Poor</option>
                <option value="1">Terrible</option>
            </select>
        </div>


               <label for="glsr-rtl" style="pointer-events: none;">Comfort:</label>
        <div class="form-field">
            <select id="glsr-rtl" class="star-rating-old" name='comfort'>
                <option value="">Select a rating</option>
                <option value="5">Fantastic</option>
                <option value="4">Great</option>
                <option value="3">Good</option>
                <option value="2">Poor</option>
                <option value="1">Terrible</option>
            </select>
        </div>

          <label for="glsr-rtl" style="pointer-events: none;">Location:</label>
        <div class="form-field">
            <select id="glsr-rtl" class="star-rating-old" name='location'>
                <option value="">Select a rating</option>
                <option value="5">Fantastic</option>
                <option value="4">Great</option>
                <option value="3">Good</option>
                <option value="2">Poor</option>
                <option value="1">Terrible</option>
            </select>
        </div>


         <label for="glsr-rtl" style="pointer-events: none;">Free WIFI:</label>
        <div class="form-field">
            <select id="glsr-rtl" class="star-rating-old" name='free_wifi'>
                <option value="">Select a rating</option>
                <option value="5">Fantastic</option>
                <option value="4">Great</option>
                <option value="3">Good</option>
                <option value="2">Poor</option>
                <option value="1">Terrible</option>
            </select>
        </div>
     <label for="glsr-rtl" style="pointer-events: none;">Add Your Comment:</label>
        <div class="form-field">

        <span ><textarea name="comment" cols="40" rows="8"  aria-invalid="false" placeholder=" Your reviews"></textarea></span><br>
                        </div>

        <div class="button-group">
            <button type="submit" style="color: #5c5c5c;">Submit</button>
            <button type="reset" style="color: #5c5c5c;">Reset form</button>
        </div>
    </form>
</section>



<script>
var destroyed = false;
var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
    prebuilt: true,
    maxStars: 5,
});
var starrating = new StarRating('.star-rating', {
    stars: function (el, item, index) {
        el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
    },
});
var starratingOld = new StarRating('.star-rating-old');
document.querySelector('.toggle-star-rating').addEventListener('click', function () {
    if (!destroyed) {
        starrating.destroy();
        starratingOld.destroy();
        starratingPrebuilt.destroy()
        destroyed = true;
    } else {
        starrating.rebuild();
        starratingOld.rebuild();
        starratingPrebuilt.rebuild()
        destroyed = false;
    }
});
</script>


</div>

</div>
</div>






<div id="My Booking" class="tabcontent">

<h3>My Booking</h3>

<style type="text/css">

table {
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
color: #000000;
padding: 8px;
}

tr:nth-child(even) {
background-color: #D9D9D9;
}
</style>


<div class="nd_booking_section  nd_booking_border_1_solid_grey nd_booking_padding_20 nd_booking_box_sizing_border_box">

<table>
<tr>
<th>Order ID</th>
<th>Travel Date</th>
<th>Total</th>
<th>Payment Status</th>
</tr>
<tr>
<td><a href="#">113</a></td>
<td><a href="#">Sep 11, 2022 to Sep 12, 2022</a></td>
<td><span>$98.10</span></td>
<td><span>Pending</span></td>
</tr>
<tr>
<td><a href="#">113</a></td>
<td><a href="#">Sep 11, 2022 to Sep 12, 2022</a></td>
<td><span>$98.10</span></td>
<td><span>Pending</span></td>
</tr>
<tr>
<td><a href="#">113</a></td>
<td><a href="#">Sep 11, 2022 to Sep 12, 2022</a></td>
<td><span>$98.10</span></td>
<td><span>Pending</span></td>
</tr>
   <tr>
<td><a href="#">113</a></td>
<td><a href="#">Sep 11, 2022 to Sep 12, 2022</a></td>
<td><span>$98.10</span></td>
<td><span>Pending</span></td>
</tr>
   <tr>
<td><a href="#">113</a></td>
<td><a href="#">Sep 11, 2022 to Sep 12, 2022</a></td>
<td><span>$98.10</span></td>
<td><span>Pending</span></td>
</tr>
</table>



</div>

</div>

<script>
function openPage(pageName,elmnt,color) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablink");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].style.backgroundColor = "";
}
document.getElementById(pageName).style.display = "block";
elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



</div>



                </div>
            </div>
                    <!--end content-->
        </div>
        <!--post-->

    </div>
    <!--END all content-->
@stop
