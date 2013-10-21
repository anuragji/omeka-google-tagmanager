omeka-google-tagmanager
=======================

For Omeka 2.0+.

## Installation

Download the plugin by visiting the [downloads]() page and selecting the most
current version of the plugin. Move those files over to the plugins directory
of your Omeka install.

After the files are moved over you will need to login to Omeka and activate
the plugin.

## Configuration

The only configurable option in this plugin is the Google Tagmanager Container ID

Your Google Tag Manager Container ID can be found by following the steps below.

* Log into Google Tag Manager - http://www.google.com/tagmanager
* Select your Account in the list of Accounts
* Click on "Containers" to view the list of available containers
* Select your the desired container - the ID (GTM-XXXXXX) is displayed right next to the container name


## Hook

The required hook for this plugin is `public_body`. Please make sure to include the following hook right after the `body` tag,
presumably in _yourtheme/common/header.php_ .

``` php
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
```

-----

Developed by [THE DIGITAL ARK, CORP]. (http://www.thedigitalark.com).

Based on the Google Analytics Plugin from [Bowling Green State University] (https://github.com/BGSU-LITS/GoogleAnalytics-Plugin)