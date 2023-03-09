<?php
class Characters extends Controller
{
    public function index()
    {
        $data["title"] = "Character List";
        $data["characters"] = $this->model("Characters_model")->getAllCharacters();
        $this->view("templates/header", $data);
        $this->view("characters/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["title"] = "Detail Character";
        $data["characters"] = $this->model("Characters_model")->getCharacterById($id);
        $this->view("templates/header", $data);
        $this->view("characters/detail", $data);
        $this->view("templates/footer");
    }

    public function add()
    {
        if ($this->model("Characters_model")->addDataCharacter($_POST) > 0) {
            Flasher::setFlash("has been", "added!", "success");
            header("Location: " . BASEURL . "/characters");
            exit;
        } else {
            Flasher::setFlash("failed to", "add.", "danger");
            header("Location: " . BASEURL . "/characters");
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model("Characters_model")->deleteDataCharacter($id) > 0) {
            Flasher::setFlash("has been", "deleted!", "success");
            header("Location: " . BASEURL . "/characters");
            exit;
        } else {
            Flasher::setFlash("failed to", "delete.", "danger");
            header("Location: " . BASEURL . "/characters");
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model("Characters_model")->getCharacterById($_POST["id"]));
    }

    public function edit()
    {
        if ($this->model("Characters_model")->editDataCharacter($_POST) > 0) {
            Flasher::setFlash("has been", "edited", "success");
            header("Location: " . BASEURL . "/characters");
            exit;
        } else {
            Flasher::setFlash("failed to", "edit", "danger");
            header("Location: " . BASEURL . "/characters");
            exit;
        }
    }

    public function search()
    {
        $data["title"] = "Character List";
        $data["characters"] = $this->model("Characters_model")->searchCharacter();
        $this->view("templates/header", $data);
        $this->view("characters/index", $data);
        $this->view("templates/footer");
    }
}
