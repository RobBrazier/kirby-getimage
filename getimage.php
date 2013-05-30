<?php
function getimage($page, $imgurl, $options=array(), $tag=true){
  new getimage($page, $imgurl, $options, $tag);
}

class getimage {

  private $height;
  private $width;
  private $cdn;
  private $fallback_filename;

  public function __construct($page, $imgurl, $options=array(), $tag=true) {
    if(!function_exists('thumb')){
      die('You must download the <a href="https://github.com/bastianallgeier/kirbycms-extensions/tree/master/plugins/thumb">Thumb</a> Plugin to use this Plugin!');
    }
    $this->cdn = @$options['cdn'];
    $this->fallback_filename = @$options['fallback'];
    $urlarray = explode('/', $imgurl);
    $filename = array_pop($urlarray);
    $path = $page->root().'/'.$filename;
    if(!file_exists($imgurl)){
      $imgurl = str_replace($filename, $this->fallback_filename, $imgurl);
    }
    if(!file_exists($path)){
      file_put_contents($path, file_get_contents($imgurl));
    }
    if(isset($this->cdn)){
      echo str_replace(c::get('url'), $this->cdn, thumb($page->images()->find($filename), $options, false));
    } else {
      echo thumb($page->images()->find($filename), $options, $tag);
    }

  }

}