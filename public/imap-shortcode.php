<?php
  require_once plugin_dir_path(__FILE__) . 'imap_generate_agencies.php';
  
  function imap_diplay_shortcode( $atts ){
   
      
?>

<script type="text/javascript">
    $(function () {
        $(".mapcontainer").mapael({
            map: {
                // Set the name of the map to display
                name: "iranmapael",
                defaultArea: {
                    attrs: {
                        stroke: "#fff",
                        fill: "rgb(199, 215, 223)",
                        "stroke-width": 0
                    },
                    eventHandlers: {
                        click: function (e, id, mapElem, textElem, elemOptions) {
                            if (typeof elemOptions.Agencies != 'undefined') {
                                $('.Agencies').html(elemOptions.Agencies).css({
                                    display: 'none'
                                }).fadeIn('slow');
                            }
                        }
                    }
                },

                // Default attributes can be set for all links
                defaultLink: {
                    factor: 0.3,
                    attrsHover: {
                        stroke: "#blue"
                    }
                },

                defaultPlot: {
                    size: 16,

                    attrs: {
                        fill: "red",
                        stroke: "white",
                        "stroke-width": 2,
                        opacity: 1,
                    },
                }

            },
    <?php 
        imap_generate_plot();
        imap_generate_areas();
        imap_generate_link();
    ?>
        });
    });
   
</script>
<script> 

$(function () {

    var listOfProvinces = document.querySelector(".provinces-list");
        listOfProvinces.addEventListener("mouseover", e =>{
        var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
        pathColor.setAttribute("fill", "rgb(243, 138, 3)");
    });

    // pathYouNeeded.style.fill='rgb(243, 138, 3)';
    listOfProvinces.addEventListener("mouseout", e =>{
    var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
    pathColor.setAttribute("fill", "rgb(199, 215, 223)");
    });
});
 
</script>

<div class="container">

    <!-- <h1>Iran simple svg Map</h1> -->

    <div class="mapcontainer">
        <div class="map"></div>
        <div class="province-button">
            <ul class="provinces-list">
                <li id="alborz">                    <a href="#" id="alborz">                      <?php _e( 'alborz', 'imap' ); ?> </a> </li>
                <li id="ardabil">                   <a href="#" id="ardabil">                     <?php _e('ardabil', 'imap'); ?> </a></li>
                <li id="east-azerbaijan">           <a href="#" id="east-azerbaijan">             <?php _e('east-azerbaijan', 'imap'); ?> </a></li>
                <li id="west-azerbaijan">           <a href="#" id="west-azerbaijan">             <?php _e('west-azerbaijan', 'imap'); ?> </a></li>
                <li id="bushehr">                   <a href="#" id="bushehr">                     <?php _e('bushehr', 'imap'); ?> </a></li>
                <li id="chaharmahal-and-bakhtiari"> <a href="#" id="chaharmahal-and-bakhtiari">   <?php _e('chaharmahal-and-bakhtiari', 'imap'); ?> </a></li>
                <li id="fars">                      <a href="#" id="fars">                        <?php _e('fars', 'imap'); ?> </a></li>
                <li id="gilan">                     <a href="#" id="gilan">                       <?php _e('gilan', 'imap'); ?> </a></li>
                <li id="golestan">                  <a href="#" id="golestan">                    <?php _e('golestan', 'imap'); ?> </a></li>
                <li id="hamadan">                   <a href="#" id="hamadan">                     <?php _e('hamadan', 'imap'); ?> </a></li>
                <li id="hormozgan">                 <a href="#" id="hormozgan">                   <?php _e('hormozgan', 'imap'); ?> </a></li>
                <li id="ilam">                      <a href="#" id="ilam">                        <?php _e('ilam', 'imap'); ?> </a></li>
                <li id="isfahan">                   <a href="#" id="isfahan">                     <?php _e('isfahan', 'imap'); ?> </a></li>
                <li id="kerman">                    <a href="#" id="kerman">                      <?php _e('kerman', 'imap'); ?> </a></li>
                <li id="kermanshah">                <a href="#" id="kermanshah">                  <?php _e('kermanshah', 'imap'); ?> </a></li>
                <li id="north-khorasan">            <a href="#" id="north-khorasan">              <?php _e('north-khorasan', 'imap'); ?> </a></li>
                <li id="khorasan-razavi">           <a href="#" id="khorasan-razavi">             <?php _e('khorasan-razavi', 'imap'); ?> </a></li>
                <li id="south-khorasan">            <a href="#" id="south-khorasan">              <?php _e('south-khorasan', 'imap'); ?> </a></li>
                <li id="khuzestan">                 <a href="#" id="khuzestan">                   <?php _e('khuzestan', 'imap'); ?> </a></li>
                <li id="kohgiluyeh-and-boyer-ahmad"><a href="#" id="kohgiluyeh-and-boyer-ahmad">  <?php _e('kohgiluyeh-and-boyer-ahmad', 'imap'); ?> </a></li>
                <li id="kurdistan">                 <a href="#" id="kurdistan">                   <?php _e('kurdistan', 'imap'); ?> </a></li>
                <li id="lorestan">                  <a href="#" id="lorestan">                    <?php _e('lorestan', 'imap'); ?> </a></li>
                <li id="markazi">                   <a href="#" id="markazi">                     <?php _e('markazi', 'imap'); ?> </a></li>
                <li id="mazandaran">                <a href="#" id="mazandaran">                  <?php _e('mazandaran', 'imap'); ?> </a></li>
                <li id="qazvin">                    <a href="#" id="qazvin">                      <?php _e('qazvin', 'imap'); ?> </a></li>
                <li id="qom">                       <a href="#" id="qom">                         <?php _e('qom', 'imap'); ?> </a></li>
                <li id="semnan">                    <a href="#" id="semnan">                      <?php _e('semnan', 'imap'); ?> </a></li>
                <li id="sistan-baluchestan">        <a href="#" id="sistan-baluchestan">          <?php _e('sistan-baluchestan', 'imap'); ?> </a></li>
                <li id="tehran">                    <a href="#" id="tehran">                      <?php _e('tehran', 'imap'); ?> </a></li>
                <li id="yazd">                      <a href="#" id="yazd">                        <?php _e('yazd', 'imap'); ?> </a></li>
                <li id="zanjan">                    <a href="#" id="zanjan">                      <?php _e('zanjan', 'imap'); ?> </a></li>
                <!-- <li id="caspian">                   <a href="#" id="caspian">                     <?php _e('caspian', 'imap'); ?> </a></li> -->
                <!-- <li id="persian-gulf">              <a href="#" id="persian-gulf">                <?php _e('persian-gulf', 'imap'); ?> </a></li> -->
                <!-- <li id="urmia">                     <a href="#" id="urmia">                       <?php _e('urmia', 'imap'); ?> </a></li> -->

            </ul>
        </div>

    </div>

</div>
<div class="container">
    <div class="Agencies">
        <div class="aboutus" style="line-height: 30px;">
        <p>جهت مشاهده نمایندگان هر استان روی نام استان کلیک کنید.</p>


        </div>
    </div>
</div>

<?php
 }
 add_shortcode( 'foobar', 'imap_diplay_shortcode' );
 ?>