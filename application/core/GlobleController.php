<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GlobleController extends CI_Controller {

    protected $data = [];

    function __construct() {
        parent::__construct();
        $this->data['gcategories'] = $this->Product_model->menuController();
    }
}