# Realia

Complete real estate solution in one plugin. Create your real estate website or directory with few clicks over the night.

## Description

You can try it out by visiting a preview demo at [http://preview.wprealia.com/plugin/realia](http://preview.wprealia.com/plugin/realia "Demo").

### WP REST API integration

Plugin offers option to search for properties via API. Plugin adds options to filter properties by custom fields. Realia extends default API output by new fields as well. Check an API request at [http://preview.wprealia.com/plugin/realia/wp-json/posts?type=property&filter-beds=3](http://preview.wprealia.com/plugin/realia/wp-json/posts?type=property&filter-beds=3) to see how easy is to filter by custom fields. It is possible to filter by same fields as plugin uses in front end widgets. So there are available more than 20+ fields.

> Interested in iOS app written in Swift? Don't hesitate and contact us and we can offer you Realia Browser app for your site.
>
> Check the app documentation: [http://wprealia.com/en/documentation/realia-browser/overview/](http://wprealia.com/en/documentation/realia-browser/overview/ "Realia Browser")

### Front end submission system

Realia allows to add properties by your users. Create the property directory by few clicks. If you want you can review newly added properties before publishing. Of course it is possible to charge users for using your website. Plugins has builtin pay per post and package system.

### Property management

Manage properties from WordPress admin. Custom version of table display is containing all important information about properties like featured image, price and assigned taxonomy terms.

### Price formatting options

Realia supports various price formatting options. You can define the currency where you are able to set currency sign and number formatting options like number of decimal places, decimal point and thousands separator.

For properties you can set another group of price settings. You are able to write alphanumeric text instead of price amount or add your custom prefix and suffix.

Are you developer and still not satisfied with price formatting? Don't worry. Everything is located in one method so it is pretty easy to change the functionality.

### Agencies & Agents

With Realia plugin you are able to assign agents to properties and create agencies grouping agents. Great for internal purposes or directory listings.

### Widgets

* Google Map with properties
* Vertical filter
* Properties
* Agents
* Assigned agents to property
* Enquire form

### Property Attributes

* Featured image
* Image gallery
* Location
* Property type
* Status
* Contract
* Material
* Amenities
* Address
* Property ID
* Year built
* Featured
* Sticky
* Reduced
* Video link
* Price
* Rooms
* Beds
* Baths
* Garages
* Home area & Lot size (dimensions + area)
* GPS position
* Description
* Floor plans
* Land valuation
* Public facilities
* Agent assignment

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
* Not other plugins required

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

### Custom actions

* realia_before_property_archive
* realia_after_property_archive
* realia_before_agency_archive
* realia_after_agency_archive
* realia_before_agent_archive
* realia_after_agent_archive
* realia_before_property_box_title
* realia_after_property_box_title
* realia_before_property_box_body
* realia_after_property_box_body

### Shortcodes

| **Key**                             | **Description**                            |
|:------------------------------------|:-------------------------------------------|
| `[realia_breadcrumb]`               | Displays breadcrumb                        |
| `[realia_login]`                    | Login page                                 |
| `[realia_logout]`                   | Logout page                                |
| `[realia_register]`                 | Register page                              |
| `[realia_change_password]`          | Change password page                       |
| `[realia_change_profile]`           | Change profile page                        |
| `[realia_change_agent_profile]`     | Change agent profile page                  |
| `[realia_submission]`               | Create and edit property form              |
| `[realia_submission_list]`          | List of properties added by current user   |
| `[realia_submission_remove]`        | Remove property                            |
| `[realia_submission_package_info]`  | Displays package information, if available |
| `[realia_submission_payment]`       | Payment page                               |
| `[realia_transactions]`             | Transaction history for current user       |

## Installation

1. Upload `realia` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` section in WordPress admin.

## Frequently Asked Questions

**How do I add property filter to my site?**

Just put a `Vertical Filter` widget into suitable widget area. You can also specify which fields will be shown and which to hide in widget settings.

**How can I add property map into my website?**

Put a `Properties Map` widget into widget area. In widget settings set latitude and longitude of map center. You can set zoom level, cluster grid size and map style as well.

**I want to set 'negotiated price' for my property. How can I do that ?**

You are able to set custom price text of each property in its detail. You can also set price prefix and suffix if you wish.

**How do I assign agents to property ?**

Create at least one agent at first and then choose one or more you wish to assign in property detail.

## Screenshots

1. Google map with properties
2. Property grid
3. Front end submission form
4. Property detail
5. Payment page
6. Search filter widget
7. Property widget
8. Agents widget
9. User properties

## Changelog

**0.8.0**

*Release Date - 9th July, 2015*

* default display type for agents and properties widgets
* property row image size
* multiple tabs on one page fix
* latitude and longitude fields for map revealed
* breadcrumb fix
* template structure adjustments
* other minor tweaks and fixes


**0.7.0**

*Release Date - 27th June, 2015*

* wire transfer
* removed PayPal library
* added better paginations
* template loader fix
* property map position in detail
* minor CSS fixes

**0.6.0**

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

**0.5.0**

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

**0.4.0**

*Release Date - 3nd June, 2015*

* WP API properties filter functionality
* PayPal libraries are loading after filling credentials
* Added material search filter
* Property sorting
* New archive pages actions
* CMB2 moved to TGM
* PayPal library cleanup

**0.3.0**

*Release Date - 2nd June, 2015*

* Added amenities, status, contract, rooms filters
* Options to select property layout in "Properties" widget
* Read more text for property boxes
* Call Realia_Template_Loader:locate() with plugin param
* New CMB2 version
* Templates cleanup
* Updated translation catalogue

**0.2.0**

*Release Date - 29th May, 2015*

* Material
* Rooms
* Home area & Lot size (dimensions + area)

**0.1.0**

*Release Date - 22th May, 2015*

* initial release
