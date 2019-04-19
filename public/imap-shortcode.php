<?php
  require_once plugin_dir_path(__FILE__) . 'imap-generate-agencies.php';
  
  function iran_agency_map_display_shortcode( $atts ){
    ob_start();

    // set setting value
    $options = get_option( 'iran_agency_map_settings' );
    if( isset( $options['iran_agency_map_bg_color']) ){
        $imap_background_color = $options['iran_agency_map_bg_color'];
    }
    else $imap_background_color = '#c7d7df';

    if( isset( $options['iran_agency_map_bg_hover_color']) ){
        $imap_hover_color = $options['iran_agency_map_bg_hover_color'];
    }
    else $imap_hover_color = '#08da53';


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
        iran_agency_map_generate_plot();
        iran_agency_map_generate_areas();
        $options = get_option( 'iran_agency_map_settings' );
        if( isset( $options['iran_agency_map_check_link'] ) && isset( $options['iran_agency_map_centeral_agency'] ) )
        {
            iran_agency_map_generate_link();
        }
        
    ?>
        });
    });
   
</script>
<script> 
jQuery(function ($) {
    
    //action when mouse hover on province Items and map sections
    var listOfProvinces = document.querySelector(".provinces-list");
    var provinceTooltip = document.querySelector(".mapTooltip");
        listOfProvinces.addEventListener("mouseover", e =>{
        provinceTooltip.style.visibility = "hidden";
        var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
        pathColor.setAttribute("fill", "<?php echo "$imap_hover_color"; ?>");
    });

    
    listOfProvinces.addEventListener("mouseout", e =>{
    provinceTooltip.style.visibility = "unset";
    var pathColor = document.querySelector(`[data-id='${e.target.id}']`);
    pathColor.setAttribute("fill", "<?php echo "$imap_background_color"; ?>");
    });

// set color of buttons from setting page
    $(".provinces-list li").children().css({"color": "#000", "background": "<?php echo "$imap_background_color"; ?>"});
    $(".provinces-list li").children().hover(function() {
      $(this).css({"color": "#fff", "background": "<?php echo "$imap_hover_color"; ?>"}).mouseout(function(){
              $(this).css({"color": "#000", "background": "<?php echo "$imap_background_color"; ?>"});
          });
  });
});

</script>

<div class="imap-section">
    <div class="mapcontainer">
        <div class="map"></div>
        <div class="province-button">
            <ul class="provinces-list">
                <li data-type="area" data-id="east-azerbaijan" id="east-azerbaijan">           <a href="#" id="east-azerbaijan">             <?php _e('east-azerbaijan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="west-azerbaijan" id="west-azerbaijan">           <a href="#" id="west-azerbaijan">             <?php _e('west-azerbaijan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="ardabil" id="ardabil">                   <a href="#" id="ardabil">                     <?php _e('ardabil', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="isfahan" id="isfahan">                   <a href="#" id="isfahan">                     <?php _e('isfahan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="alborz" id="alborz">                    <a href="#" id="alborz">                      <?php _e( 'alborz', 'iran-agency-map' ); ?> </a> </li>
                <li data-type="area" data-id="ilam" id="ilam">                      <a href="#" id="ilam">                        <?php _e('ilam', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="bushehr" id="bushehr">                   <a href="#" id="bushehr">                     <?php _e('bushehr', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="tehran" id="tehran">                    <a href="#" id="tehran">                      <?php _e('tehran', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="chaharmahal-and-bakhtiari" id="chaharmahal-and-bakhtiari"> <a href="#" id="chaharmahal-and-bakhtiari">   <?php _e('chaharmahal-and-bakhtiari', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="north-khorasan" id="north-khorasan">            <a href="#" id="north-khorasan">              <?php _e('north-khorasan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="khorasan-razavi" id="khorasan-razavi">           <a href="#" id="khorasan-razavi">             <?php _e('khorasan-razavi', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="south-khorasan" id="south-khorasan">            <a href="#" id="south-khorasan">              <?php _e('south-khorasan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="khuzestan" id="khuzestan">                 <a href="#" id="khuzestan">                   <?php _e('khuzestan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="zanjan" id="zanjan">                    <a href="#" id="zanjan">                      <?php _e('zanjan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="semnan" id="semnan">                    <a href="#" id="semnan">                      <?php _e('semnan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="sistan-baluchestan" id="sistan-baluchestan">        <a href="#" id="sistan-baluchestan">          <?php _e('sistan-baluchestan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="fars" id="fars">                      <a href="#" id="fars">                        <?php _e('fars', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="qazvin" id="qazvin">                    <a href="#" id="qazvin">                      <?php _e('qazvin', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="qom" id="qom">                       <a href="#" id="qom">                         <?php _e('qom', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="kurdistan" id="kurdistan">                 <a href="#" id="kurdistan">                   <?php _e('kurdistan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="kerman" id="kerman">                    <a href="#" id="kerman">                      <?php _e('kerman', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="kermanshah" id="kermanshah">                <a href="#" id="kermanshah">                  <?php _e('kermanshah', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="kohgiluyeh-and-boyer-ahmad" id="kohgiluyeh-and-boyer-ahmad"><a href="#" id="kohgiluyeh-and-boyer-ahmad">  <?php _e('kohgiluyeh-and-boyer-ahmad', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="golestan" id="golestan">                  <a href="#" id="golestan">                    <?php _e('golestan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="gilan" id="gilan">                     <a href="#" id="gilan">                       <?php _e('gilan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="lorestan" id="lorestan">                  <a href="#" id="lorestan">                    <?php _e('lorestan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="mazandaran" id="mazandaran">                <a href="#" id="mazandaran">                  <?php _e('mazandaran', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="markazi" id="markazi">                   <a href="#" id="markazi">                     <?php _e('markazi', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="hormozgan" id="hormozgan">                 <a href="#" id="hormozgan">                   <?php _e('hormozgan', 'iran-agency-map' ); ?> </a></li>
                <li data-type="area" data-id="hamadan" id="hamadan">                   <a href="#" id="hamadan">                     <?php _e('hamadan', 'iran-agency-map' ); ?> </a></li>                
                <li data-type="area" data-id="yazd" id="yazd">                      <a href="#" id="yazd">                        <?php _e('yazd', 'iran-agency-map' ); ?> </a></li>
            </ul>
        </div>

    </div>

</div>
<div class="imap-section imap-clear">
    <div class="Agencies">
        <div class="aboutus" style="line-height: 30px;">
        <p><?php _e( 'Click on every agency to display information of every agency.', 'iran-agency-map' ) ?></p>


        </div>
    </div>
</div>

<?php
return ob_get_clean();
 }
 add_shortcode( 'iran-agency-map', 'iran_agency_map_display_shortcode' );