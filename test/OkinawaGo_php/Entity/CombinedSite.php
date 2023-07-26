<?php
class CombinedSite {
    public $site;
    public $area;
    public $comment;
    public $image;
    public $category;   

    function __construct($site, $area, $comment, $image, $category){
        $this->site = $site;
        $this->area = $area;
        $this->comment = $comment;
        $this->image = $image;
        $this->category = $category;
    }
}
?>