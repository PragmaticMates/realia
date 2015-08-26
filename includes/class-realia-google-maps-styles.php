<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Google_Maps_Styles
 *
 * @class Realia_Google_Maps_Styles
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Google_Maps_Styles {
	/**
	 * Gets style definition
	 *
	 * @access public
	 * @param string $slug
	 * @return mixed
	 */
	public static function get_style( $slug = '' ) {
		if ( empty( $slug ) ) {
			return null;
		}

		$snazzy_maps = self::styles();

		foreach ( $snazzy_maps as $map ) {
			if ( $map['slug'] == $slug ) {
				return $map['styles'];
			}
		}

		return null;
	}

	/**
	 * Gets list of styles
	 *
	 * @access public
	 * @return array
	 */
	public static function styles() {
		return array(
			array(
				'slug'		=> 'apple-maps-esque',
				'title' 	=> 'Apple Maps-esque',
				'styles' 	=> '[{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]',
			),
			array(
				'slug'		=> 'pale-dawn',
				'title' 	=> 'Pale Dawn',
				'styles' 	=> '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]',
			),
			array(
				'slug'		=> 'light-monochrome',
				'title' 	=> 'Light Monochrome',
				'styles' 	=> '[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]',
			),
			array(
				'slug'		=> 'paper',
				'title' 	=> 'Paper',
				'styles' 	=> '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"},{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]}]',
			),
			array(
				'slug'		=> 'flat-map',
				'title' 	=> 'Flat Map',
				'styles' 	=> '[{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]}]',
			),
			array(
				'slug'		=> 'gowalla',
				'title' 	=> 'Gowalla',
				'styles' 	=> '[{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}]',
			),
			array(
				'slug'		=> 'shift-worker',
				'title' 	=> 'Shift Worker',
				'styles' 	=> '[{"stylers":[{"saturation":-100},{"gamma":1}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]}]',
			),
			array(
				'slug'		=> 'routexl',
				'title' 	=> 'RouteXL',
				'styles' 	=> '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}]',
			),
			array(
				'slug'		=> 'mapbox',
				'title' 	=> 'MapBox',
				'styles' 	=> '[{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]',
			),
			array(
				'slug'		=> 'bentley',
				'title' 	=> 'Bentley',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"hue":"#F1FF00"},{"saturation":-27.4},{"lightness":9.4},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#0099FF"},{"saturation":-20},{"lightness":36.4},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#00FF4F"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFB300"},{"saturation":-38},{"lightness":11.2},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00B6FF"},{"saturation":4.2},{"lightness":-63.4},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#9FFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]}]',
			),
			array(
				'slug'		=> 'bright-and-bubbly',
				'title' 	=> 'Bright &amp; Bubbly',
				'styles' 	=> '[{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]}]',
			),
			array(
				'slug'		=> 'blue-gray',
				'title' 	=> 'Blue Gray',
				'styles' 	=> '[{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]',
			),
			array(
				'slug'		=> 'clean-cut',
				'title' 	=> 'Clean Cut',
				'styles' 	=> '[{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]}]',
			),
			array(
				'slug'		=> 'subtle-grayscale',
				'title' 	=> 'Subtle Grayscale',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]',
			),
			array(
				'slug'		=> 'blue-essence',
				'title' 	=> 'Blue Essence',
				'styles' 	=> '[{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]',
			),
			array(
				'slug'		=> 'cool-grey',
				'title' 	=> 'Cool Grey',
				'styles' 	=> '[{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]',
			),
			array(
				'slug'		=> 'neutral-blue',
				'title' 	=> 'Neutral Blue',
				'styles' 	=> '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]',
			),
			array(
				'slug'		=> 'subtle',
				'title' 	=> 'Subtle',
				'styles' 	=> '[{"featureType":"poi","stylers":[{"visibility":"off"}]},{"stylers":[{"saturation":-70},{"lightness":37},{"gamma":1.15}]},{"elementType":"labels","stylers":[{"gamma":0.26},{"visibility":"off"}]},{"featureType":"road","stylers":[{"lightness":0},{"saturation":0},{"hue":"#ffffff"},{"gamma":0}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"lightness":50},{"saturation":0},{"hue":"#ffffff"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"},{"lightness":-50}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"lightness":20}]}]',
			),
			array(
				'slug'		=> 'black-and-white',
				'title' 	=> 'Black and White',
				'styles' 	=> '[{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"weight":1}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"weight":0.8}]},{"featureType":"landscape","stylers":[{"color":"#ffffff"}]},{"featureType":"water","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"elementType":"labels.text","stylers":[{"visibility":"on"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"elementType":"labels.icon","stylers":[{"visibility":"on"}]}]',
			),
			array(
				'slug'		=> 'becomeadinosaur',
				'title' 	=> 'Become a Dinosaur',
				'styles' 	=> '[{"elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#f5f5f2"},{"visibility":"on"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#ffffff"},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#71c8d4"}]},{"featureType":"landscape","stylers":[{"color":"#e5e8e7"}]},{"featureType":"poi.park","stylers":[{"color":"#8ba129"}]},{"featureType":"road","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"color":"#c7c7c7"},{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#a0d3d3"}]},{"featureType":"poi.park","stylers":[{"color":"#91b65d"}]},{"featureType":"poi.park","stylers":[{"gamma":1.51}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"visibility":"simplified"}]},{"featureType":"road"},{"featureType":"road"},{},{"featureType":"road.highway"}]',
			),
			array(
				'slug'		=> 'icy-blue',
				'title' 	=> 'Icy Blue',
				'styles' 	=> '[{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'clean-grey',
				'title' 	=> 'Clean Grey',
				'styles' 	=> '[{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#e3e3e3"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#cccccc"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#FFFFFF"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'red-hues',
				'title' 	=> 'Red Hues',
				'styles' 	=> '[{"stylers":[{"hue":"#dd0d0d"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]}]',
			),
			array(
				'slug'		=> 'unimposed-topography',
				'title' 	=> 'Unimposed Topography',
				'styles' 	=> '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#727D82"},{"lightness":-30},{"saturation":-80}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#F3F4F4"},{"lightness":80},{"saturation":-80}]}]',
			),
			array(
				'slug'		=> 'pastel-tones',
				'title' 	=> 'Pastel Tones',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":60}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"lightness":30}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ef8c25"},{"lightness":40}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#b6c54c"},{"lightness":40},{"saturation":-40}]},{}]',
			),
			array(
				'slug'		=> 'roadie',
				'title' 	=> 'Roadie',
				'styles' 	=> '[{"elementType":"labels","stylers":[{"visibility":"off"}]},{"elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{}]',
			),
			array(
				'slug'		=> 'muted-monotone',
				'title' 	=> 'Muted Monotone',
				'styles' 	=> '[{"stylers":[{"visibility":"on"},{"saturation":-100},{"gamma":0.54}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#4d4946"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"gamma":0.48}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"gamma":7.18}]}]',
			),
			array(
				'slug'		=> 'just-places',
				'title' 	=> 'Just places',
				'styles' 	=> '[{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#fffffa"}]},{"featureType":"water","stylers":[{"lightness":50}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"lightness":40}]}]',
			),
			array(
				'slug'		=> 'aqua',
				'title' 	=> 'Aqua',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"color":"#6c8080"},{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"color":"#d98080"},{"hue":"#eeff00"},{"lightness":100},{"weight":1.5}]}]',
			),
			array(
				'slug'		=> 'homage-to-toner',
				'title' 	=> 'Homage to Toner',
				'styles' 	=> '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#FFFFFF"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[]},{"featureType":"landscape.natural","elementType":"all","stylers":[]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"hue":"#333333"},{"saturation":-100},{"lightness":-69},{"visibility":"simplified"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'ultra-light-with-labels',
				'title' 	=> 'Ultra Light with Labels',
				'styles' 	=> '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]',
			),
			array(
				'slug'		=> 'light-blue-water',
				'title' 	=> 'Light Blue Water',
				'styles' 	=> '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#71d6ff"},{"saturation":100},{"lightness":-5},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#deecec"},{"saturation":-73},{"lightness":72},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"hue":"#bababa"},{"saturation":-100},{"lightness":25},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#e3e3e3"},{"saturation":-100},{"lightness":0},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"hue":"#59cfff"},{"saturation":100},{"lightness":34},{"visibility":"on"}]}]',
			),
			array(
				'slug'		=> 'hard-edges',
				'title' 	=> 'Hard edges',
				'styles' 	=> '[{"featureType":"landscape.natural","stylers":[{"saturation":-100},{"lightness":100}]},{"featureType":"water","stylers":[{"saturation":-100},{"lightness":-86}]},{"elementType":"labels.text.stroke","stylers":[{"saturation":-100},{"lightness":100}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":-100},{"lightness":-75}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"saturation":-100},{"lightness":97}]},{"featureType":"poi.park","stylers":[{"saturation":-100},{"lightness":-100}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"saturation":-100},{"lightness":100}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","stylers":[{"saturation":-100},{"lightness":-68}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"saturation":-100},{"lightness":100}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"saturation":-100},{"lightness":-100}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":91}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"saturation":-100},{"lightness":-100}]},{"featureType":"transit.station","stylers":[{"saturation":-100},{"lightness":-22}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"hue":"#ff004c"},{"saturation":-100},{"lightness":44}]},{"elementType":"labels.text.fill","stylers":[{"saturation":1},{"lightness":-100}]},{"elementType":"labels.text.stroke","stylers":[{"saturation":-100},{"lightness":100}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"}]}]',
			),
			array(
				'slug'		=> 'the-endless-atlas',
				'title' 	=> 'The Endless Atlas',
				'styles' 	=> '[{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#D1D3D4"},{"saturation":-88},{"lightness":-7},{"visibility":"on"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"hue":"#939598"},{"saturation":-91},{"lightness":-34},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#414042"},{"saturation":-98},{"lightness":-60},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#E3EBE5"},{"saturation":-61},{"lightness":57},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#E3EBE5"},{"saturation":-100},{"lightness":57},{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"hue":"#E3EBE5"},{"saturation":-100},{"lightness":81},{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"hue":"#E3EBE5"},{"saturation":-100},{"lightness":81},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"hue":"#FFFFFF"},{"saturation":0},{"lightness":100},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#939598"},{"saturation":2},{"lightness":59},{"visibility":"on"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"hue":"#939598"},{"saturation":-100},{"lightness":16},{"visibility":"on"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"hue":"#939598"},{"saturation":-100},{"lightness":16},{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#939598"},{"saturation":-100},{"lightness":16},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#939598"},{"saturation":-98},{"lightness":-8},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"hue":"#FFFFFF"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#6D6E71"},{"saturation":-98},{"lightness":-43},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#FFFFFF"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"hue":"#FFFFFF"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'minimalistic-black-and-white',
				'title' 	=> 'Minimalistic Black & White',
				'styles' 	=> '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"hue":"#000000"},{"saturation":0},{"lightness":-100},{"visibility":"on"}]},{"featureType":"transit","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'roadtrip-at-night',
				'title' 	=> 'Roadtrip At Night',
				'styles' 	=> '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#eeeeee"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":3}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#2D333C"}]}]',
			),
			array(
				'slug'		=> 'holiday',
				'title' 	=> 'Holiday',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"hue":"#FFB000"},{"saturation":71.66666666666669},{"lightness":-28.400000000000006},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#E8FF00"},{"saturation":-76.6},{"lightness":113},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF8300"},{"saturation":-77},{"lightness":27.400000000000006},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF8C00"},{"saturation":-66.6},{"lightness":34.400000000000006},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00C4FF"},{"saturation":22.799999999999997},{"lightness":-11.399999999999991},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#9FFF00"},{"saturation":0},{"lightness":-23.200000000000003},{"gamma":1}]}]',
			),
			array(
				'slug'		=> 'ilustracao',
				'title' 	=> 'Ilustracao',
				'styles' 	=> '[{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#71ABC3"},{"saturation":-10},{"lightness":-21},{"visibility":"simplified"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"hue":"#7DC45C"},{"saturation":37},{"lightness":-41},{"visibility":"simplified"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#C3E0B0"},{"saturation":23},{"lightness":-12},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#A19FA0"},{"saturation":-98},{"lightness":-20},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#FFFFFF"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]}]',
			),
			array(
				'slug'		=> 'minimalistic-grey',
				'title' 	=> 'Minimalistic Grey',
				'styles' 	=> '[{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#ededed"},{"saturation":-100},{"lightness":36},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":0},{"lightness":-100},{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"hue":"#000000"},{"saturation":0},{"lightness":-100},{"visibility":"on"}]},{"featureType":"transit","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":0},{"lightness":-100},{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"hue":"#e0e0e0"},{"saturation":-100},{"lightness":-8},{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'simple-light',
				'title' 	=> 'Simple &amp; Light',
				'styles' 	=> '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#fcfcfc"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#fcfcfc"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#dddddd"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#dddddd"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#dddddd"}]}]',
			),
			array(
				'slug'		=> 'caribbean-mountain',
				'title' 	=> 'Caribbean Mountain',
				'styles' 	=> '[{"featureType":"poi.medical","stylers":[{"visibility":"simplified"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"color":"#cec6b3"}]},{"featureType":"road","stylers":[{"color":"#f2eee8"}]},{"featureType":"water","stylers":[{"color":"#01186a"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#cec6b3"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","stylers":[{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'veins',
				'title' 	=> 'Veins',
				'styles' 	=> '[{"stylers":[{"hue":"#B61530"},{"saturation":60},{"lightness":-40}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","stylers":[{"color":"#B61530"}]},{"featureType":"road","stylers":[{"color":"#B61530"},{}]},{"featureType":"road.local","stylers":[{"color":"#B61530"},{"lightness":6}]},{"featureType":"road.highway","stylers":[{"color":"#B61530"},{"lightness":-25}]},{"featureType":"road.arterial","stylers":[{"color":"#B61530"},{"lightness":-10}]},{"featureType":"transit","stylers":[{"color":"#B61530"},{"lightness":70}]},{"featureType":"transit.line","stylers":[{"color":"#B61530"},{"lightness":90}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]}]',
			),
			array(
				'slug'		=> 'lemon-tree',
				'title' 	=> 'Lemon Tree',
				'styles' 	=> '[{"featureType":"road.highway","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"hue":"#ffe94f"},{"saturation":100},{"lightness":4},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#ffe94f"},{"saturation":100},{"lightness":4},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#333333"},{"saturation":-100},{"lightness":-74},{"visibility":"off"}]}]',
			),
			array(
				'slug'		=> 'beige-white-and-blue',
				'title' 	=> 'Beige White and Blue',
				'styles' 	=> '[{"featureType":"landscape.natural","stylers":[{"visibility":"on"},{"color":"#ecd5c3"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#32c4fe"}]},{"featureType":"landscape.natural","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#baaca2"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#565757"},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#535555"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#fffffe"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":17}]},{}]',
			),
			array(
				'slug'		=> 'pinkish-gray',
				'title' 	=> 'Pinkish Gray',
				'styles' 	=> '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#0c0b0b"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#090909"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#d4e4eb"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#fef7f7"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9b7f7f"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#fef7f7"}]}]',
			),
			array(
				'slug'		=> 'white-landscape',
				'title' 	=> 'White Landscape',
				'styles' 	=> '[{"stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"},{"hue":"#ffffff"},{"saturation":-100},{"lightness":100}]},{"featureType":"water","stylers":[{"visibility":"on"},{"lightness":-35},{"saturation":-100}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":90}]}]',
			),
			array(
				'slug'		=> 'mikiwat',
				'title' 	=> 'Mikiwat',
				'styles' 	=> '[{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"336d75"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#d064a4"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#6bb1e1"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}]',
			),
			array(
				'slug'		=> 'pink-and-blue',
				'title' 	=> 'Pink &amp; Blue',
				'styles' 	=> '[{"featureType":"landscape","stylers":[{"visibility":"simplified"},{"color":"#9debff"},{"weight":0.1}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"color":"#ebebeb"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#51dbff"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#51dbff"}]},{"featureType":"poi"},{"featureType":"transit.line","stylers":[{"color":"#ff4e80"},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"weight":1.5},{"color":"#51dbff"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#51dbNaN"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#51dbff"}]},{"featureType":"poi.business","stylers":[{"color":"#9debff"},{"visibility":"off"}]},{},{"featureType":"poi.government","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","stylers":[{"visibility":"off"}]},{"featureType":"administrative","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#51dbff"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"off"}]},{},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","stylers":[{"visibility":"off"}]},{"featureType":"road"}]',
			),
			array(
		        'slug'		=> 'shades-of-grey',
		        'title' 	=> 'Shades of grey',
		        'styles' 	=> '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]',
	        ),
	        array(
		        'slug'		=> 'light-dream',
		        'title' 	=> 'Light Dream',
		        'styles' 	=> '[{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]',
	        ),
			array(
		        'slug'		=> 'shade-of-green',
		        'title' 	=> 'Shade of Green',
		        'styles' 	=> '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#76aee3"},{"saturation":38},{"lightness":-11},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"hue":"#8dc749"},{"saturation":-47},{"lightness":-17},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#c6e3a4"},{"saturation":17},{"lightness":-2},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"hue":"#cccccc"},{"saturation":-100},{"lightness":13},{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#5f5855"},{"saturation":6},{"lightness":-31},{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[]}]',
	        ),
			array(
		        'slug'		=> 'green-and-blue',
		        'title' 	=> 'Green and Blue',
		        'styles' 	=> '[{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#e9e5dc"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54},{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"all","stylers":[{"saturation":43},{"lightness":-11},{"color":"#89cada"}]}]',
	        ),
			array(
		        'slug'		=> 'light-green-view',
		        'title' 	=> 'Light Green View',
		        'styles' 	=> '[{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#effefd"}]}]',
	        ),
            array(
                'slug'		=> 'properta',
                'title' 	=> 'Properta',
                'styles' 	=> '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#6195a0"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#e6f3d6"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#f69679"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#a5c4c7"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#a5c4c7"}]}]',
            ),
            array(
                'slug'		=> 'properta-2',
                'title' 	=> 'Properta 2',
                'styles' 	=> '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":60}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#a5c4c7"},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#f69679"},{"lightness":10}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#b6c54c"},{"lightness":40},{"saturation":-40}]},{}]',
            ),
            array(
                'slug'		=> 'respedge',
                'title' 	=> 'RespEdge',
                'styles' 	=> '[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"visibility":"on"},{"saturation":"-3"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#f69679"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"color":"#f69679"},{"saturation":"0"},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#ff6f00"},{"saturation":"100"},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#f69679"},{"saturation":"0"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#008eff"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#f3dbc8"},{"saturation":"0"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]',
            ),
		);
	}
}
