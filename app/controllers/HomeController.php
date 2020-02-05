<?php

namespace App\controllers;

class HomeController extends Controller {

    public function index() {
        $this->SetPageTitle("Abastecimento");
        $this->RenderView("home", "layouts/main");
    }
}