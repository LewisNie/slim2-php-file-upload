<?php
    function createImage($url){
        $img = new Image();
        $img->setUrl($url);
        $img->save();
    }
?>