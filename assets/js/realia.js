jQuery(document).ready(function($) {
    'use strict';

    if ($('.property-gallery-index').length !== 0 && $('.property-gallery-preview').length !== 0) {
        $('.property-gallery-index a').on('click', function() {
            $(this).closest('ul').find('li').removeClass('active');
            $(this).closest('.property-gallery').find('.property-gallery-preview img').attr('src', $(this).attr('rel'));
            $(this).parent().addClass('active');
        });
    }

    var fontawesome = {
        starType: 'i',
        starOn: 'fa fa-star',
        starHalf: 'fa fa-star-half-o',
        starOff: 'fa fa-star-o'
    };

    if ($('.review-rating-total').length !== 0) {
        $('.review-rating-total').each(function () {
            var rating = $(this);
            var opts = {
                path: rating.data('path'),
                score: rating.data('score'),
                readOnly: true
            };

            if ($(this).data('fontawesome') !== undefined) {
                $.extend(opts, fontawesome);
            }

            rating.raty(opts);
        });
    }

    if ($('.review-rating').length !== 0) {
        $('.review-rating').each(function () {
            var rating = $(this);
            var opts = {
                path: rating.data('path'),
                score: rating.data('score'),
                readOnly: true
            };

            if ($(this).data('fontawesome') !== undefined) {
                $.extend(opts, fontawesome);
            }

            rating.raty(opts);
        });
    }

    if ($('.review-form-rating').length !== 0) {
        var opts = {
            path: $('.review-form-rating').data('path'),
            targetScore: '#rating'
        };

        if ($('.review-form-rating').data('fontawesome') !== undefined) {
            $.extend(opts, fontawesome);
        }

        $('.review-form-rating').raty(opts);
    }

    /**
     * Remove favorite
     */
    $('.favorite-button-delete').on('click', function(e) {
        var button = $(this);
        e.preventDefault();
        $.ajax(button.attr('href')).success(function(data) {
            location.reload();
        });        
    });

    /**
     * Remove submission
     */
    $('.property-button-delete').on('click', function(e) {
        var button = $(this);
        e.preventDefault();
        $.ajax(button.attr('href')).success(function(data) {
            location.reload();
        });        
    });

    /**
     * Cookie policy
     */
    $('.cookie-policy-confirm').on('click', function(e) {
    	e.preventDefault();
        $.cookie('cookie-policy', true);
    	var el = $('.cookie-policy');    	    	

    	el.animate({
    		bottom: -el.outerHeight()
    	}, 400, function() {
    		el.remove();
    	});
    });

    /**
     * Google Map
     */
    var map = $('#map');

    if (map.length) {
        var styles = map.data('styles');

        $.ajax({
            url: '?properties-feed=true',
            success: function(markers) {
                map.google_map({
                    infowindow: {
                        borderBottomSpacing: 0,
                        height: 120,
                        width: 424,
                        offsetX: 48,
                        offsetY: -87
                    },
                    center: {
                        latitude: map.data('latitude'),
                        longitude: map.data('longitude')
                    },
                    zoom: map.data('zoom'),
                    marker: {
                        height: 56,
                        width: 56
                    },  
                    cluster: {
                        height: 40,
                        width: 40,
                        gridSize: map.data('grid-size')
                    },
                    styles: styles,
                    transparentMarkerImage: map.data('transparent-marker-image'),
                    transparentClusterImage: map.data('transparent-marker-image'),
                    markers: markers            
                });
            }
        });
    }


    /**
     * Simple map
     */
    var simple_map = $('#simple-map');
    if (simple_map.length) {
        var styles = simple_map.data('styles');

        simple_map.google_map({
            center: {
                latitude: simple_map.data('latitude'),
                longitude: simple_map.data('longitude')
            },
            zoom: simple_map.data('zoom'),
            styles: styles,
            transparentMarkerImage: simple_map.data('transparent-marker-image'),
            marker: {
                height: 56,
                width: 56
            },
            markers: [{
                latitude: simple_map.data('latitude'),
                longitude: simple_map.data('longitude'),
                marker_content: '<div class="simple-marker"></div>'
            }]
        });
    }
});