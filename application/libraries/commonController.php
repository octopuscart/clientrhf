<?php

class Common_tasks {

    function Common_tasks() {
        $gdata["msg"] = "Hello";
        $this->load->view('Layout/header.php', $gdata);
    }

}
