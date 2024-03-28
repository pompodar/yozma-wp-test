<?php
    $id = get_field('id');

    $image = get_field('image');
    $heading = get_field('heading');
    $paragraph = get_field('paragraph');
    $items_repeater = get_field('items_repeater');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='map'>
    <div class="container">
        <div class="map__inner">
            <div class="map__row-left">
                <div class="map__row-left__background-color"></div>
                <div class="map__row-left__background-image">
                    <div id="map"></div>
                </div>
            </div>
            <div class="map__row-right">
                <h2 class="map__heading">

                    <?= $heading ?>

                </h2>

                <div class="map__paragraph map__paragraph"><?= $paragraph ?></div>
                <?php if ($items_repeater) : ?>
                <?php foreach ($items_repeater as $index => $item) : ?>
                <?php
                            $paragraph = $item['paragraph'];
                        ?>
                <div class="list__item">
                    <div class="list__item__paragraph"><?= $paragraph ?></div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 51.4125317,
            lng: -0.7037485
        },
        zoom: 17,
        styles: [{
                "featureType": "administrative.locality",
                "elementType": "all",
                "stylers": [{
                        "hue": "#2c2e33"
                    },
                    {
                        "saturation": 7
                    },
                    {
                        "lightness": 19
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "saturation": "-3"
                    }
                ]
            },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#fd901b"
                }]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                        "hue": "#ffffff"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 100
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.school",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#f39247"
                    },
                    {
                        "saturation": "0"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                        "hue": "#ff6f00"
                    },
                    {
                        "saturation": "100"
                    },
                    {
                        "lightness": 31
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#968b27"
                }]
            },
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#f39247"
                    },
                    {
                        "saturation": "0"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                        "hue": "#008eff"
                    },
                    {
                        "saturation": -93
                    },
                    {
                        "lightness": 31
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fd901b"
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "color": "#f3dbc8"
                    },
                    {
                        "weight": 3
                    },
                    {
                        "saturation": "0"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels",
                "stylers": [{
                        "hue": "#bbc0c4"
                    },
                    {
                        "saturation": -93
                    },
                    {
                        "lightness": -2
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "on"
                }]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                        "hue": "#e9ebed"
                    },
                    {
                        "saturation": -90
                    },
                    {
                        "lightness": -8
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                        "hue": "#e9ebed"
                    },
                    {
                        "saturation": 10
                    },
                    {
                        "lightness": 69
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                        "hue": "#e9ebed"
                    },
                    {
                        "saturation": -78
                    },
                    {
                        "lightness": 67
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#e9e9e9"
                }]
            }
        ]
    });

    const latLng = {
        lat: 51.4125317,
        lng: -0.7037485
    };

    const priceTag = document.createElement("div");

    priceTag.className = "price-tag";
    priceTag.style.width = "10px";
    priceTag.style.height = "5px";
    priceTag
        .style.background = "#f39247";


    google.maps.event.addListenerOnce(map, 'idle', function() {
        const marker = new google.maps.Marker({
            position: latLng,
            map: map,
            content: priceTag,

        });
    });
}

window.initMap = initMap;
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATMk-LK3CtZr8Fv_afPxGT_Ci7VdoN5t4&callback=initMap"></script>