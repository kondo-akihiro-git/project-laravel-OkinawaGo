<?php
class Site {
    public $id_site;
    public $name_site;
    public $address;

    function __construct($id_site, $name, $address) {
        $this->id_site = $id_site;
        $this->name_site = $name;
        $this->address = $address;
    }
}
?>