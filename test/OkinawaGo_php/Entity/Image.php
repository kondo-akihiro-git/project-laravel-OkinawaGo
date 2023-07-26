<?php
class Image {
    public $img_file;
    public $id_site;

    function __construct($img_file, $id_site) {
        $this->img_file = $img_file;
        $this->id_site = $id_site;
    }
}
?>