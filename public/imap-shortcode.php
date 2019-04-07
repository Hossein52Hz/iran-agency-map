<?php
  //[foobar]
  
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
                                    if (typeof elemOptions.myText != 'undefined') {
                                        $('.myText').html(elemOptions.myText).css({display: 'none'}).fadeIn('slow');
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
                        
                        defaultPlot : {
                            size:16,
                            
                            attrs: {
                                fill:"red",
                                stroke:"white",
                                "stroke-width":2,
                                opacity:1,
                            },
                            // animDuration: 300,
                            // cssClass: "hossein"
                            
                        }
                                               
                    },
                    plots: {
                    'isfahan': {
                        latitude: 400,
                        longitude: 400,
                        tooltip: {content: "Isfahan"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    'tehran': {
                        latitude: 270,
                        longitude: 370,
                        tooltip: {content: "Tehran"}
                    },
                    'mashhad': {
                        latitude: 250,
                        longitude: 730,
                        tooltip: {content: "Khorasan Razavi"}
                    }
                },
                areas: {
                    "IR-01": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-02": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-03": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-04": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-05": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-06": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-07": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-08": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-09": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-10": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-11": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-12": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-13": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-14": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-15": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-16": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-17": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-18": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-19": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-20": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-21": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-22": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-23": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-24": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-25": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-26": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-27": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-28": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },

                    "IR-29": {
                        tooltip: {content: "دریای"},
                        myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "

                    },
                    "IR-30": {
                        tooltip: {content: "دریای"},
                        myText: '<div class="branch"><div><img src="./1.png" alt="" class="profile right"><ul class="info"><li class="cityname">اصفهان</li><li class="fullname">شرکت آریان زیست</li></ul></div><div class="contact"><ul><li><span>مدیریت: </span> حسین مسعودی</li><li><span>تلفن تماس: </span>031-31234567</li><li><span>شماره همراه: </span>091312345678</li><li><span>آدرس: </span>اصفهان خیابان جی پاساژ احمدی پلاک ۱۲ واحد۲۲۰</li></ul></div></div>'

                    },
                    "IR-31": {
                        tooltip: {content: " خزر دریای"},
                        myText: '<div class="branch">\
                                    <div>\
                                        <img src="./1.png" alt="" class="profile right">\
                                        <ul class="info">\
                                            <li class="cityname">اصفهان</li>\
                                            <li class="fullname">شرکت آریان زیست</li>\
                                        </ul>\
                                    </div>\
                                    <div class="contact">\
                                        <ul>\
                                            <li><span>مدیریت: </span> حسین مسعودی</li>\
                                            <li><span>تلفن تماس: </span>031-31234567</li>\
                                            <li><span>شماره همراه: </span>091312345678</li>\
                                            <li><span>آدرس: </span>اصفهان خیابان جی پاساژ احمدی پلاک ۱۲ واحد۲۲۰</li>\
                                        </ul>\
                                    </div>\
                                </div>'
                    },

                    "IR-32": {
                        attrs: {
                            fill: "rgb(108, 174, 216)"
                        },
                        tooltip: {content: "دریای"},
                    },
                    "IR-33": {
                        attrs: {
                            fill: "rgb(108, 174, 216)"
                        }
                    },
                    "IR-34": {
                        tooltip: {content: "دریای"},
                        myText: '<div class="branch"><div><img src="./1.png" alt="" class="profile right"><ul class="info"><li class="cityname">اصفهان</li><li class="fullname">شرکت آریان زیست</li></ul></div><div class="contact"><ul><li><span>مدیریت: </span> حسین مسعودی</li><li><span>تلفن تماس: </span>031-31234567</li><li><span>شماره همراه: </span>091312345678</li><li><span>آدرس: </span>اصفهان خیابان جی پاساژ احمدی پلاک ۱۲ واحد۲۲۰</li></ul></div></div>'

                    },

                    "IR-35": {
                        tooltip: {content: "دریای"},
                        myText: '<div class="branch"><div><img src="./1.png" alt="" class="profile right"><ul class="info"><li class="cityname">اصفهان</li><li class="fullname">شرکت آریان زیست</li></ul></div><div class="contact"><ul><li><span>مدیریت: </span> حسین مسعودی</li><li><span>تلفن تماس: </span>031-31234567</li><li><span>شماره همراه: </span>091312345678</li><li><span>آدرس: </span>اصفهان خیابان جی پاساژ احمدی پلاک ۱۲ واحد۲۲۰</li></ul></div></div>'

                    },

                    "IR-36": {
                        tooltip: {content: "دریای"},
                        myText: '<div class="branch"><div><img src="./1.png" alt="" class="profile right"><ul class="info"><li class="cityname">اصفهان</li><li class="fullname">شرکت آریان زیست</li></ul></div><div class="contact"><ul><li><span>مدیریت: </span> حسین مسعودی</li><li><span>تلفن تماس: </span>031-31234567</li><li><span>شماره همراه: </span>091312345678</li><li><span>آدرس: </span>اصفهان خیابان جی پاساژ احمدی پلاک ۱۲ واحد۲۲۰</li></ul></div></div>'

                    },

                },
                 // Links allow you to connect plots between them
                 links: {
                    'isfahanmashhad': {
                        // ... Or with IDs of plotted points
                        factor: -0.3
                        , between: ['isfahan', 'mashhad']
                        , attrs: {
                            "stroke-width": 3
                        }
                        , tooltip: {content: "isfahan - mashhad"}
                    },
                    'isfahantehran': {
                        // ... Or with IDs of plotted points
                        factor: -0.3
                        , between: ['isfahan', 'tehran']
                        , attrs: {
                            "stroke-width": 3
                        }
                        , tooltip: {content: "isfahan - tehran"}
                    }

                }

                });
            });
            

        </script>
<div class="container">

    <!-- <h1>Iran simple svg Map</h1> -->

    <div class="mapcontainer">
        <div class="map">
            
        </div>
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
        <!-- <div class="about-desc">
                <div class="about-us" style="line-height: 30px;">
            <p>
                وبسیما حاصل یک تفکر تحول گرا و زیبایی محور است. این گروه در سال 2012 میلادی با اهدافی بزرگ و آرمان گرایانه پا به عرصه تجارت بین المللی نهاد و از همان ابتدا با رویکردی انقلابی در زمینه تبلیغات و بازاریابی، توانسته است تا به امروز در این مسیر استوار و ثابت قدم باقی بماند. هدف ما رسیدن به جایگاهی فراتر از مرزهای کشور عزیزمان است. وبسیما ارائه دهنده یک بسته کامل از خدمات و سرویس هاست. این بدان معنی است که ما با بهره مندی از بهترین کارشناسان، به مشتریان خود سرویس ها و خدمات بی نظیری را ارائه میدهیم، یک آژانس خلاقیت کامل. یک طرح بازاریابی جامع و مهارت برای اجرای آن. اگر به یک سرویس تبلیغاتی آنلاین یا آفلاین، یا یک وبسایت منحصر به فرد و یا یک استراتژی بی رقیب نیازمند هستید، ما شما را حمایت می کنیم تا تمامی اهداف مشترکمان محقق شود.
            </p>
            </div>
        </div> -->
            
        </div>
       
    </div>
    <div class="container">
            <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       <div class="myText">
               <div class="aboutus" style="line-height: 30px;">
                       <p>
                           جهت اخذ نمایندگی می توانید با ما تماس بگیرید.
                       </p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>شماره تماس:  0912345678</p>
                       <p>ٍپست الکترونیک: csmasoudi@gmail.com</p>
           
                   </div> 
       </div>
       </div>
 
   
</div>



<?php
 }
 add_shortcode( 'foobar', 'imap_diplay_shortcode' );
 ?>