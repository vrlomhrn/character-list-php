<?php

class About extends Controller
{
    public function index() {
        $data["name"] = $this->model("User_model")->getUser();
        $data["profession"] = $this->model("User_model")->getProfession();
        $data["title"] = "About";
        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }
    public function page(){
        $data["title"] = "About/Pages";
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}
