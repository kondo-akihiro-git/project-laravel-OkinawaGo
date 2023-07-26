<?php
class Category {
    public $name_category;
    public $id_site;

    function __construct($name_category, $id_site) {
        $this->name_category = $name_category;
        $this->id_site = $id_site;
    }
}
?>