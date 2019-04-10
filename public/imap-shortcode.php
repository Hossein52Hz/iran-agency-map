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

<div class="container">

    <!-- <h1>Iran simple svg Map</h1> -->

    <div class="mapcontainer">
        <div class="map"></div>
        <div class="province-button">
            <ul>
                <li><a href="#"> آذربایجان شرقی </a></li>
                <li><a href="#"> آذربایجان غربی </a></li>
                <li><a href="#"> اردبیل </a></li>
                <li><a href="#"> اصفهان </a></li>
                <li><a href="#"> البرز </a></li>
                <li><a href="#"> ایلام </a></li>
                <li><a href="#"> بوشهر </a></li>
                <li><a href="#"> تهران </a></li>
                <li><a href="#"> چهارمحال بختیاری </a></li>
                <li><a href="#"> خراسان جنوبی </a></li>
                <li><a href="#"> خراسان رضوی </a></li>
                <li><a href="#"> خراسان شمالی </a></li>
                <li><a href="#"> خوزستان </a></li>
                <li><a href="#"> زنجان </a></li>
                <li><a href="#"> سمنان </a></li>
                <li><a href="#"> سیستان و بلوچستان </a></li>
                <li><a href="#"> فارس </a></li>
                <li><a href="#"> قزوین </a></li>
                <li><a href="#"> قم </a></li>
                <li><a href="#"> کردستان </a></li>
                <li><a href="#"> کرمان </a></li>
                <li><a href="#"> کرمانشاه </a></li>
                <li><a href="#"> کهگیلویه و بویر احمد </a></li>
                <li><a href="#"> گلستان </a></li>
                <li><a href="#"> گیلان </a></li>
                <li><a href="#"> لرستان </a></li>
                <li><a href="#"> مازندران </a></li>
                <li><a href="#"> مرکزی </a></li>
                <li><a href="#"> هرمزگان </a></li>
                <li><a href="#"> همدان </a></li>
                <li><a href="#"> یزد </a></li>

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