<?php
  require_once plugin_dir_path(__FILE__) . 'imap_generate_agencies.php';
  
  function imap_diplay_shortcode( $atts ){
    ob_start();

    // set setting value
    $options = get_option( 'imap_settings' );
    $imap_background_color = $options['imap_bg_color'];
    $imap_hover_color = $options['imap_bg_hover_color'];


?>

<script type="text/javascript">
    // $(function () {
jQuery(function ($) {
        $(".mapcontainer").mapael({
            map: {
                // Set the name of the map to display
                name: "iranmapael",
                defaultArea: {
                    attrs: {
                        stroke: "#fff",
                        fill: "<?php echo "$imap_background_color"; ?>",
                        "stroke-width": 0
                    },
                    attrsHover: {
                        fill: "<?php echo "$imap_hover_color"; ?>"
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
                        "stroke-width": 3,
                        opacity: 1,
                    },
                }

            },
    <?php 
        imap_generate_plot();
        imap_generate_areas();
        $options = get_option( 'imap_settings' );
        if( isset( $options['imap_check_link'] ) && isset( $options['imap_centeral_agency'] ) )
        {
            imap_generate_link();
        }
        
    ?>
        });
    });
   
</script>
<script> 
jQuery(function ($) {
    /* You can safely use $ in this code block to reference jQuery */
    var listOfProvinces = document.querySelector(".provinces-list");
        listOfProvinces.addEventListener("mouseover", e =>{
        var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
        pathColor.setAttribute("fill", "<?php echo "$imap_hover_color"; ?>");
    });

    // pathYouNeeded.style.fill='rgb(243, 138, 3)';
    listOfProvinces.addEventListener("mouseout", e =>{
    var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
    pathColor.setAttribute("fill", "<?php echo "$imap_background_color"; ?>");
    });
});

</script>

<div class="container">

    <!-- <h1>Iran simple svg Map</h1> -->

    <div class="mapcontainer">
        <div class="map"></div>
        <div class="province-button">
            <ul class="provinces-list">
                <li data-type="area" data-id="alborz" id="alborz">                    <a href="#" id="alborz">                      <?php _e( 'alborz', 'imap' ); ?> </a> </li>
                <li data-type="area" data-id="ardabil" id="ardabil">                   <a href="#" id="ardabil">                     <?php _e('ardabil', 'imap'); ?> </a></li>
                <li data-type="area" data-id="east-azerbaijan" id="east-azerbaijan">           <a href="#" id="east-azerbaijan">             <?php _e('east-azerbaijan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="west-azerbaijan" id="west-azerbaijan">           <a href="#" id="west-azerbaijan">             <?php _e('west-azerbaijan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="bushehr" id="bushehr">                   <a href="#" id="bushehr">                     <?php _e('bushehr', 'imap'); ?> </a></li>
                <li data-type="area" data-id="chaharmahal-and-bakhtiari" id="chaharmahal-and-bakhtiari"> <a href="#" id="chaharmahal-and-bakhtiari">   <?php _e('chaharmahal-and-bakhtiari', 'imap'); ?> </a></li>
                <li data-type="area" data-id="fars" id="fars">                      <a href="#" id="fars">                        <?php _e('fars', 'imap'); ?> </a></li>
                <li data-type="area" data-id="gilan" id="gilan">                     <a href="#" id="gilan">                       <?php _e('gilan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="golestan" id="golestan">                  <a href="#" id="golestan">                    <?php _e('golestan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="hamadan" id="hamadan">                   <a href="#" id="hamadan">                     <?php _e('hamadan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="hormozgan" id="hormozgan">                 <a href="#" id="hormozgan">                   <?php _e('hormozgan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="ilam" id="ilam">                      <a href="#" id="ilam">                        <?php _e('ilam', 'imap'); ?> </a></li>
                <li data-type="area" data-id="isfahan" id="isfahan">                   <a href="#" id="isfahan">                     <?php _e('isfahan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="kerman" id="kerman">                    <a href="#" id="kerman">                      <?php _e('kerman', 'imap'); ?> </a></li>
                <li data-type="area" data-id="kermanshah" id="kermanshah">                <a href="#" id="kermanshah">                  <?php _e('kermanshah', 'imap'); ?> </a></li>
                <li data-type="area" data-id="north-khorasan" id="north-khorasan">            <a href="#" id="north-khorasan">              <?php _e('north-khorasan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="khorasan-razavi" id="khorasan-razavi">           <a href="#" id="khorasan-razavi">             <?php _e('khorasan-razavi', 'imap'); ?> </a></li>
                <li data-type="area" data-id="south-khorasan" id="south-khorasan">            <a href="#" id="south-khorasan">              <?php _e('south-khorasan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="khuzestan" id="khuzestan">                 <a href="#" id="khuzestan">                   <?php _e('khuzestan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="kohgiluyeh-and-boyer-ahmad" id="kohgiluyeh-and-boyer-ahmad"><a href="#" id="kohgiluyeh-and-boyer-ahmad">  <?php _e('kohgiluyeh-and-boyer-ahmad', 'imap'); ?> </a></li>
                <li data-type="area" data-id="kurdistan" id="kurdistan">                 <a href="#" id="kurdistan">                   <?php _e('kurdistan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="lorestan" id="lorestan">                  <a href="#" id="lorestan">                    <?php _e('lorestan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="markazi" id="markazi">                   <a href="#" id="markazi">                     <?php _e('markazi', 'imap'); ?> </a></li>
                <li data-type="area" data-id="mazandaran" id="mazandaran">                <a href="#" id="mazandaran">                  <?php _e('mazandaran', 'imap'); ?> </a></li>
                <li data-type="area" data-id="qazvin" id="qazvin">                    <a href="#" id="qazvin">                      <?php _e('qazvin', 'imap'); ?> </a></li>
                <li data-type="area" data-id="qom" id="qom">                       <a href="#" id="qom">                         <?php _e('qom', 'imap'); ?> </a></li>
                <li data-type="area" data-id="semnan" id="semnan">                    <a href="#" id="semnan">                      <?php _e('semnan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="sistan-baluchestan" id="sistan-baluchestan">        <a href="#" id="sistan-baluchestan">          <?php _e('sistan-baluchestan', 'imap'); ?> </a></li>
                <li data-type="area" data-id="tehran" id="tehran">                    <a href="#" id="tehran">                      <?php _e('tehran', 'imap'); ?> </a></li>
                <li data-type="area" data-id="yazd" id="yazd">                      <a href="#" id="yazd">                        <?php _e('yazd', 'imap'); ?> </a></li>
                <li data-type="area" data-id="zanjan" id="zanjan">                    <a href="#" id="zanjan">                      <?php _e('zanjan', 'imap'); ?> </a></li>


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
return ob_get_clean();
 }
 add_shortcode( 'imap', 'imap_diplay_shortcode' );