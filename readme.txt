=== Realia ===
Contributors: pragmaticmates
Tags: real estate, agent, listing, estator, realestate, agent, agency, house, directory, property
Requires at least: 4.1
Tested up to: 4.3
Stable tag: 0.8.5
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Complete real estate solution in one plugin. Create your real estate website or directory with few clicks over the night.

== Description ==

Realia is full featured WordPress real estate plugin. It is completely covering needs of real estate agencies or portals. Plugin allows you to manage all your properties, agents and agencies.

* Official website at [wprealia.com](http://wprealia.com)
* Check the demo at [preview.wprealia.com/plugin/realia](http://preview.wprealia.com/plugin/realia)
* Documentation at [wprealia.com/documentation/index.html](http://wprealia.com/documentation/index.html)
* Free Bootstrap theme at [preview.wprealia.com/theme/bootstrap](http://preview.wprealia.com/theme/bootstrap) download from [GitHub](http://github.com/pragmaticmates/realia-bootstrap)
* Premium themes [Megareal](http://themeforest.net/item/megareal-real-estate-portal-theme/full_screen_preview/11965035?ref=aviators), [Realocation](http://themeforest.net/item/realocation-modern-real-estate-wordpress-theme/7605274?ref=aviators), [Realia](http://themeforest.net/item/realia-responsive-real-estate-wordpress-theme/4789838?ref=aviators)
* Mobile applications [Realia Browser for iOS](http://codecanyon.net/item/realia-browser-real-estate-ios-app/11827488)

### Front End Submission

Realia allows to add properties by your users. Create the property directory by few clicks. If you want you can review newly added properties before publishing. Of course it is possible to charge users for using your website. Plugins has builtin pay per post and package system.

### Property management

Manage properties from WordPress admin. Custom version of table display is containing all important information about properties like featured image, price and assigned taxonomy terms.

### WP REST API integration

Plugin offers option to search for properties via API. Plugin adds options to filter properties by custom fields. Realia extends default API output by new fields as well. Check an API request at [wprealia.com](http://preview.wprealia.com/plugin/realia/wp-json/posts?type=property&filter-beds=3) to see how easy is to filter by custom fields. It is possible to filter by same fields as plugin uses in front end widgets. So there are available more than 20+ fields.

### Price Formatting Options

Realia supports various price formatting options. You can define the currency where you are able to set currency sign and number formatting options like number of decimal places, decimal point and thousands separator.

For properties you can set another group of price settings. You are able to write alphanumeric text instead of price amount or add your custom prefix and suffix.

Are you developer and still not satisfied with price formatting? Don't worry. Everything is located in one method so it is pretty easy to change the functionality.

### Agencies & Agents

With Realia plugin you are able to assign agents to properties and create agencies grouping agents. Great for internal purposes or directory listings.

### Features

* Front end submission system
* Pay per post
* Package system
* Review before submission
* Pay for featured or sticky property
* Google map support
* Received transactions
* Advanced price formatting
* Agent contact form on property detail
* Custom measurement
* Plays nicely with Twenty Fifteen
* Easy for developers
* All settings are in customizer
* OOP architecture
* row/grid version of property archive
* reCAPTCHA support for enquire form
* Terms and conditions link from registration form

### Custom post types

* Property
* Agent
* Agency
* Package

### Custom taxonomies

* Locations
* Property types
* Statuses
* Amenities
* Materials

== Installation ==

1. Make sure you are using at least PHP version 5.3.4 !
2. Upload `realia` to the `/wp-content/plugins/` directory.
3. Activate the plugin through the `Plugins` section in WordPress admin.

== Frequently Asked Questions ==

**How do I add property filter to my site?**

Just put a `Vertical Filter` widget into suitable widget area. You can also specify which fields will be shown and which to hide in widget settings.

**How can I add property map into my website?**

Put a `Properties Map` widget into widget area. In widget settings set latitude and longitude of map center. You can set zoom level, cluster grid size and map style as well.

**I want to set 'negotiated price' for my property. How can I do that?**

You are able to set custom price text of each property in its detail. You can also set price prefix and suffix if you wish.

**How do I assign an agent to property?**

Create at least one agent at first and then choose the one you wish to assign in property detail.

**Are there any requirements before installing plugin?**

Just be sure you are running at least PHP 5.3.4

== Screenshots ==

1. Google map with properties
2. Property grid
3. Front end submission form
4. Property detail
5. Payment page
6. Search filter widget
7. Property widget
8. Agents widget
9. User properties

== Changelog ==

= 0.8.5 =

*Release Date - 26th August, 2015*

* refactored admin menu
* admin notice
* new Realia admin icons
* updated TGM
* terms and conditions order register form fix
* agent email fix
* 3 new map styles
* shortcodes fix
* updated translation catalogue

= 0.8.4 =

*Release Date - 19th August, 2015*

* user registration fix
* property map geolocation support
* agent email fix

= 0.8.3 =

*Release Date - 30th July, 2015*

* agency backend fix

= 0.8.2 =

*Release Date - 21th July, 2015*

* after register custom redirect
* template adjustments
* template loader fix
* button naming convention

= 0.8.1 =

*Release Date - 13th July, 2015*

* forms template structure

= 0.8.0 =

*Release Date - 9th July, 2015*

* default display type for agents and properties widgets
* property row image size
* multiple tabs on one page fix
* latitude and longitude fields for map revealed
* breadcrumb fix
* template structure adjustments
* other minor tweaks and fixes

= 0.7.0 =

*Release Date - 27th June, 2015*

* wire transfer
* removed PayPal library
* added better paginations
* template loader fix
* property map position in detail
* minor CSS fixes

= 0.6.0 =

*Release Date - 24th June, 2015*

* user can be registered as agent
* breadcrumb update
* slovak translation
* agents and agencies admin table update
* custom public facilities and valuations
* property can have more assigned agents
* refactored property fields with 'attributes_' prefix
* realia_change_password, realia_change_profile, realia_change_agent_profile shortcodes
* some fixes

= 0.5.0 =

*Release Date - 16th June, 2015*

* WP API for agents
* WP API for agencies
* Added Rent/Sale search widget
* All search fields are orderable
* Added multiple search fields
* Refactored agents, agencies and properties templates
* Agent custom post type admin columns
* Location taxonomies are now hierarchical
* Breadcrumb now has better structure
* Other small improvements and fixes

= 0.4.0 =

*Release Date - 3nd June, 2015*

* WP API filter functionality
* PayPal libraries are loading after filling credentials
* Added material search filter
* Property sorting
* New archive pages actions
* CMB2 moved to TGM
* PayPal library cleanup

= 0.3.0 =
*Release Date - 2nd June, 2015*

* Added amenities, status, contract, rooms filters
* Options to select property layout in "Properties" widget
* Read more text for property boxes
* Call Realia_Template_Loader:locate() with plugin param
* New CMB2 version
* Templates cleanup
* Updated translation catalogue

= 0.2.0 =
*Release Date - 29th May, 2015*

* Material
* Rooms
* Home area & Lot size (dimensions + area)

= 0.1.0 =
*Release Date - 22th May, 2015*

* Initial release
