<?php

class Pages extends Controller {

    public function __construct() {
    }

    public function index() {

        $data = [
            'title'         => 'Shareposts',
            'description'   => 'Simple Social Network'
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title'         => 'About Us',
            'description'   => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
    }

}