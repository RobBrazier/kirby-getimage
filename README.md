Kirby GetImage Plugin
=====================

GetImage is a KirbyCMS Plugin that hooks off the functionality of the [Thumb](https://github.com/bastianallgeier/kirbycms-extensions/tree/master/plugins/thumb) plugin and allows the use of remote images to be used with `thumb();`


## Usage

Currently, the only way I have found to pass the `$page` variable is through a function argument, so this is the reason for the first argument. Hopefully it will be taken out in subsequent releases!

`getimage($page, $imgurl, $options[, $tagorurl])`

**$page** is the `$page` variable containing the information about the page that the image will be saved to (hopefully will be removed in the future)

**$imgurl** is the URL of the image that you want to save

**$options** is an array containing the information to be passed along to `thumb()` and also an extra **'cdn'** array key, where you can specify another URL for the images to be hosted from

**$tagorurl** is a **boolean** value stating whether the returned text contains the `ing` tag or just the URL to the image