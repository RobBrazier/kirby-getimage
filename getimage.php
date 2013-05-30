<?php
function getimage($page, $imgurl, $options=array(), $tagorurl=true){
  new getimage($page, $imgurl, $options, $tagorurl);
}

class getimage {

  private $height;
  private $width;
  private $cdn;

  public function __construct($page, $imgurl, $options=array(), $tagorurl=true) {
    if(!function_exists('thumb')){
      die('You must download the <a href="https://github.com/bastianallgeier/kirbycms-extensions/tree/master/plugins/thumb">Thumb</a> Plugin to use this Plugin!');
    }
    $this->cdn = @$options['cdn'];
    $this->fallback_filename = @$options['fallback'];
    $urlarray = explode('/', $imgurl);
    $filename = array_pop($urlarray);
    $path = $page->root().'/'.$filename;
    if(!file_exists($imgurl)){
      $imgurl = str_replace($filename, $fallback_filename, $imgurl);
    }
    if(!file_exists($path)){
      file_put_contents($path, file_get_contents($imgurl));
    }
    if(isset($this->cdn)){
      echo str_replace(c::get('url'), $this->cdn, thumb($page->images()->find($filename), $options, false));
    } else {
      echo thumb($page->images()->find($filename), $options, $tagorurl);
    }

  }

}