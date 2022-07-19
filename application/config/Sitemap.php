<?php

class Sitemap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // We load the url helper to be able to use the base_url() function
        $this->load->helper('url');

        $this->load->model('SitemapModel');

        // Array of some articles for demonstration purposes
    }

    /**
     * Generate a sitemap index file
     * More information about sitemap indexes: http://www.sitemaps.org/protocol.html#index
     */
    public function index() {
        $this->SitemapModel->add(base_url(), NULL, 'monthly', 1);
        $this->SitemapModel->add(base_url('contact'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('about-us'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('privacy-policy'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('review'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('annual-charity'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('book-now'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('gallery'), NULL, 'monthly', 0.9);
        $this->SitemapModel->add(base_url('loyalty-program'), NULL, 'monthly', 0.9);
        $this->SitemapModel->output();
    }

    /**
     * Generate a sitemap both based on static urls and an array of urls
     */
    public function general() {
        $sitemap = [
            array('title' => 'INSIGHTS', 'url' => base_url('about-us'), 'suburl' => array()),
            array('title' => 'Gallery', 'url' => base_url('gallery'), 'suburl' => array()),
            array('title' => 'Loyalty Program', 'url' => base_url('loyalty-program'), 'suburl' => array()),
            array('title' => 'Review', 'url' => base_url('review'), 'suburl' => array()),
            array('title' => "CHARITY", 'url' => base_url('annual-charity'), 'suburl' => array()),
            array('title' => "Contact", 'url' => base_url('contact'), 'suburl' => array()),
            array('title' => "Order Now", 'url' => base_url('menu/0/0'), 'suburl' => array()),
            array('title' => "Book", 'url' => base_url('book-now'), 'suburl' => array()),
        ];
        $blog = [];
   

        $data['sitemap'] = $sitemap;
        $this->load->view('Pages/sitemap', $data);
    }

    /**
     * Generate a sitemap only on an array of urls
     */
    public function articles() {

        $this->SitemapModel->output();
    }

}
