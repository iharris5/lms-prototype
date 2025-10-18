<?php
class HomeController extends Controller {
    public function index() {
        header("Location: " . BASE_URL . "/role");
        exit;
    }
}

