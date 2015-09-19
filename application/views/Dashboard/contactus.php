
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false&callback=initMap"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>

<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-contact">
    <div class="map-contact">
        <div id="map"></div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <h2>Have a question? <br> Don't hesitate to send us a message. Our team will be happy to help you.</h2>
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-sm-6">
            <form  action="<?=site_url('Dashboard/sendMail')?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="firstname" class="h6">Name</label>
                        <input name="name"  type="text" id="firstname" class="form-control form-white">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="email" class="h6">E-mail</label>
                        <input  name="email" type="text" id="email" class="form-control form-white">
                    </div>
                    <div class="col-sm-6">
                        <label for="website" class="h6">Subject</label>
                        <input name="subject"  type="text" id="website" class="form-control form-white">
                    </div>
                </div>
                <label for="message" class="h6">Message</label>
                <textarea  name="message" rows="7" id="message" class="form-control form-white"></textarea>
                <button type="submit" class="btn btn-primary m-t-20">Send message</button>
            </form>
        </div>
        <div class="col-sm-4 col-sm-offset-1">
            <div class="additional">
                <h3>Need Help?</h3>
                <p>Don’t hesitate to ask us something. Email us directly <a href="#">support@themes-lab.com</a> or call us at <b>1-254-752-254</b>. You can checkout our <a href="#">FAQ</a> and <a href="#">Forum</a> page to get more information about our products.</p>
            </div>
            <div class="additional">
                <h3>FAQ</h3>
                <p>As a Harvard professor, he was one of the first to explore the relationship between chemical equilibrium and the reaction rate of chemical processes.</p>
            </div>
            <div class="phone">
                <h1 class="c-primary">542 578 20 88</h1>
                AVAILABLE AT 12PM - 18PM
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->


<script>
    
    // The following example creates a marker in Stockholm, Sweden using a DROP
    // animation. Clicking on the marker will toggle the animation between a BOUNCE
    // animation and no animation.
    
    var marker;
    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 31.576, lng: 74.425}
        });
        
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: 31.576, lng: 74.425}
        });
        marker.addListener('click', toggleBounce);
    }
    
    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
    
</script>