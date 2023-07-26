<?php
class Area {
    public $id_area;
    public $name_area;

    function __construct($id_area, $name_area) {
        $this->$id_area = $id_area;
        $this->$name_area = $name_area;
    }
}
?>