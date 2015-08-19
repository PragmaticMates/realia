/*!
 * jQuery Google Map
 *
 * @author Pragmatic Mates, http://pragmaticmates.com
 * @version 1.1
 * @license GPL 2
 * @link https://github.com/PragmaticMates/jquery-google-map
 */


(function ($) {
	var settings;
	var element;
	var map;
	var markers = new Array();
	var markerCluster;
	var clustersOnMap = new Array();
	var clusterListener;

	var methods = {
		init: function (options) {
			element = $(this);

			var defaults = $.extend({
				geolocation: false,
				styles: null,
				zoom: 14,
				markers: [],
				infowindow: {
					borderBottomSpacing: 6,
					height: 150,
					width: 340,
                    offsetX: -21,
                    offsetY: -21
				},
				marker: {
					height: 40,
					width: 40
				},
				cluster: {
					height: 40,
					width: 40,
					gridSize: 40
				}
			});

			settings = $.extend({}, defaults, options);

			loadMap();

			if (options.callback) {
				options.callback();
			}

			return $(this);
		},

		removeMarkers: function () {
			for (i = 0; i < markers.length; i++) {
				markers[i].infobox.close();
				markers[i].marker.close();
				markers[i].setMap(null);
			}

			markerCluster.clearMarkers();

			$.each(clustersOnMap, function (index, cluster) {
				cluster.cluster.close();
			});

			clusterListener.remove();
		},

		addMarkers: function (options) {
			markers = new Array();
			settings.locations = options.locations;
			settings.contents = options.contents;
			settings.types = options.types;

			renderElements();
		}
	}

	$.fn.google_map = function (method) {
		if (methods[method]) {
			return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' + method + ' does not exist on Aviators Map');
		}
	};

	function loadMap() {
		var mapOptions = {
			zoom: settings.zoom,
			styles: settings.styles,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			draggable: true,
			mapTypeControl: false,
			panControl: false,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.LEFT_BOTTOM
			}
		};

        if (settings.center !== undefined) {
            mapOptions.center = new google.maps.LatLng(settings.center.latitude, settings.center.longitude);
        }

		map = new google.maps.Map($(element)[0], mapOptions);

		if (settings.geolocation) {
			if (navigator.geolocation) {
				browserSupportFlag = true;
				navigator.geolocation.getCurrentPosition(function (position) {
					initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					map.setCenter(initialLocation);
				}, function () {
					map.center = new google.maps.LatLng(settings.center.latitude, settings.center.longitude);
				});
			} else {
				browserSupportFlag = false;
				map.center = new google.maps.LatLng(settings.center.latitude, settings.center.longitude);
			}
		}

        if (settings.center === undefined) {
            var bound = new google.maps.LatLngBounds();
            for (var i in settings.markers) {
                bound.extend(new google.maps.LatLng(settings.markers[i].latitude, settings.markers[i].longitude));
            }
            map.fitBounds(bound);
        }

		var dragFlag = false;
		var start = 0;
		var end = 0;

		function thisTouchStart(e) {
			dragFlag = true;
			start = e.touches[0].pageY;
		}

		function thisTouchEnd() {
			dragFlag = false;
		}

		function thisTouchMove(e) {
			if (!dragFlag) {
				return
			}

			end = e.touches[0].pageY;
			window.scrollBy(0, (start - end));
		}

		var el = element[0];

		if (el.addEventListener) {
			el.addEventListener('touchstart', thisTouchStart, true);
			el.addEventListener('touchend', thisTouchEnd, true);
			el.addEventListener('touchmove', thisTouchMove, true);
		} else if (el.attachEvent){
			el.attachEvent('touchstart', thisTouchStart);
			el.attachEvent('touchend', thisTouchEnd);
			el.attachEvent('touchmove', thisTouchMove);
		}

		google.maps.event.addListener(map, 'zoom_changed', function () {
            $.each(markers, function (index, marker) {
                if (marker.infobox !== undefined) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });
		});

		renderElements();
	}

	function isClusterOnMap(clustersOnMap, cluster) {
		if (cluster === undefined) {
			return false;
		}

		if (clustersOnMap.length == 0) {
			return false;
		}

		var val = false;

		$.each(clustersOnMap, function (index, cluster_on_map) {
			if (cluster_on_map.getCenter() == cluster.getCenter()) {
				val = cluster_on_map;
			}
		});

		return val;
	}

	function addClusterOnMap(cluster) {
		// Hide all cluster's markers
		$.each(cluster.getMarkers(), (function () {
			if (this.marker.isHidden == false) {
				this.marker.isHidden = true;
				this.marker.close();
			}
		}));

		var newCluster = new InfoBox({
			markers: cluster.getMarkers(),
			draggable: true,
			content: '<div class="clusterer"><div class="clusterer-inner">' + cluster.getMarkers().length + '</div></div>',
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -21),
			position: cluster.getCenter(),
			closeBoxURL: "",
			isHidden: false,
			enableEventPropagation: true,
			pane: "floatPane"
		});

		cluster.cluster = newCluster;

		cluster.markers = cluster.getMarkers();
		cluster.cluster.open(map, cluster.marker);
		clustersOnMap.push(cluster);
	}

	function renderElements() {
		$.each(settings.markers, function (index, markerObject) {
			// Create invisible markers on the map
			var args = {
				position: new google.maps.LatLng(markerObject.latitude, markerObject.longitude),
				map: map,
			};

			if (settings.transparentMarkerImage) {
				args['icon'] = {
					url: settings.transparentMarkerImage,
					size: new google.maps.Size(settings.marker.width, settings.marker.height)
				};
			}

			var marker = new google.maps.Marker(args);

			// Create infobox for infowindow
			if (markerObject.content) {
				marker.infobox = new InfoBox({
					content: markerObject.content,
					disableAutoPan: true,
					pixelOffset: new google.maps.Size(settings.infowindow.offsetX, settings.infowindow.offsetY, settings.infowindow.offsetX, settings.infowindow.offsetY),
					position: new google.maps.LatLng(markerObject.latitude, markerObject.longitude),
					isHidden: false,
                    closeBoxURL: "",
					pane: "floatPane",
					enableEventPropagation: false
				});

				marker.infobox.isOpen = false;
			}

 			// Create infobox for marker
			marker.marker = new InfoBox({
				draggable: true,
				content: markerObject.marker_content,
				disableAutoPan: true,
				pixelOffset: new google.maps.Size(-settings.marker.width/2, -settings.marker.height),
				position: new google.maps.LatLng(markerObject.latitude, markerObject.longitude),
				closeBoxURL: "",
				isHidden: false,
				pane: "floatPane",
				enableEventPropagation: true
			});

			// Handle logic for opening/closing info windows
			marker.marker.isHidden = false;
			marker.marker.open(map, marker);
			markers.push(marker);

			google.maps.event.addListener(marker, 'click', function (e) {
                if (marker.infobox !== undefined) {
                    var curMarker = this;

                    $.each(markers, function (index, marker) {
                        if (marker !== curMarker) {
                            marker.infobox.close();
                            marker.infobox.isOpen = false;
                        }
                    });

                    if (curMarker.infobox) {
                        if (curMarker.infobox.isOpen === false) {
                            curMarker.infobox.open(map, this);
                            curMarker.infobox.isOpen = true;
                        } else {
                            curMarker.infobox.close();
                            curMarker.infobox.isOpen = false;
                        }
                    }
                }
			});
		});

		markerCluster = new MarkerClusterer(map, markers, {
            gridSize: settings.cluster.gridSize,
			styles: [
				{
					textColor: 'transparent',
					height: settings.cluster.height,
					url: settings.transparentClusterImage,
					width: settings.cluster.width
				}
			]
		});

		clustersOnMap = new Array();
		clusterListener = google.maps.event.addListener(markerCluster, 'clusteringend', function (clusterer) {
			var availableClusters = clusterer.getClusters();
			var activeClusters = new Array();

			$.each(availableClusters, function (index, cluster) {
				if (cluster.getMarkers().length > 1) {
					activeClusters.push(cluster);
				}
			});

			$.each(availableClusters, function (index, cluster) {
				if (cluster.getMarkers().length > 1) {
					var val = isClusterOnMap(clustersOnMap, cluster);

					if (val !== false) {
						val.cluster.setContent('<div class="clusterer"><div class="clusterer-inner">' + cluster.getMarkers().length + '</div></div>');
						val.markers = cluster.getMarkers();
						$.each(cluster.getMarkers(), (function (index, marker) {
							if (marker.marker.isHidden == false) {
								marker.marker.isHidden = true;
								marker.marker.close();
							}
						}));
					} else {
						addClusterOnMap(cluster);
					}
				} else {
					// Show all markers without the cluster
					$.each(cluster.getMarkers(), function (index, marker) {
						if (marker.marker.isHidden == true) {
							marker.marker.open(map, this);
							marker.marker.isHidden = false;
						}
					});

					// Remove old cluster
					$.each(clustersOnMap, function (index, cluster_on_map) {
						if (cluster !== undefined && cluster_on_map !== undefined) {
							if (cluster_on_map.getCenter() == cluster.getCenter()) {
								// Show all cluster's markers
								cluster_on_map.cluster.close();
								clustersOnMap.splice(index, 1);
							}
						}
					});
				}
			});

			var newClustersOnMap = new Array();

			$.each(clustersOnMap, function (index, clusterOnMap) {
				var remove = true;

				$.each(availableClusters, function (index2, availableCluster) {
					if (availableCluster.getCenter() == clusterOnMap.getCenter()) {
						remove = false;
					}
				});

				if (!remove) {
					newClustersOnMap.push(clusterOnMap);
				} else {
					clusterOnMap.cluster.close();
				}
			});

			clustersOnMap = newClustersOnMap;
		});

        $(document).on('click', '.infobox .close', function(e) {
            e.preventDefault();

            $.each(markers, function(index, marker) {
                marker.infobox.isHidden = true;
                marker.infobox.close();
            });
        });
	}
})(jQuery);
