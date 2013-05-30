Kirby GetImage Plugin
=====================

GetImage is a KirbyCMS Plugin that hooks off the functionality of the [Thumb](https://github.com/bastianallgeier/kirbycms-extensions/tree/master/plugins/thumb) plugin and allows the use of remote images with `thumb();`

## How it Works

The Plugin downloads the specified image to the directory of the current page (e.g. a blog post).

This image object is then passed to `thumb()` to generate a thumbnail with the specified options, and can be outputted as an URL (or &lt;img&gt; tag from either the root URL or another URL e.g. a CDN such as Amazon Cloudfront).


## Usage

Currently, the only way I have found to pass the `$page` variable is through a function argument, so this is the reason for the first argument. Hopefully it will be taken out in subsequent releases!

```
getimage($page, $imgurl, $options[, $tagorurl])
```

**$page** 
> is the `$page` variable containing the information about the page that the image will be saved to (hopefully will be removed in the future)

**$imgurl** 
>  is the URL of the image that you want to save

**$options** 
>  is an array containing the information to be passed along to `thumb()` and also an extra **'cdn'** array key, where you can specify another URL for the images to be hosted from

**$tagorurl** (optional)
>  is a **boolean** value stating whether the returned text contains the `ing` tag or just the URL to the image

## Example Usage

```php
  getimage($page, 'http://img.youtube.com/vi/oHg5SJYRHA0/maxresdefault.jpg', array('height'=>'300', 'width'=>'984', 'crop'=>true, 'cdn'=>'http://cdn.test.com'), false);
```
would produce something like this: [http://cdn.test.com/thumbs/3b20166aa8acef1a4eeb36f46d4ab3ed.984.300.0.1.0.100.jpg?1369859345](http://cdn.test.com/thumbs/3b20166aa8acef1a4eeb36f46d4ab3ed.984.300.0.1.0.100.jpg?1369859345)

(due to the nature of `thumb()`, there is no need for `echo` as it doesn't seem to work when `return`ed)