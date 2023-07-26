<?php 
class Comment {
    public $id_site;
    public $comment;

    function __construct($id_site, $comment) {
        $this->id_site = $id_site;
        $this->comment = $comment;
    }
}
?>