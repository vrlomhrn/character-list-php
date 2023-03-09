<?php
class Characters_model
{
    private $table = "characters";

    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function getAllCharacters()
    {
        $this->database->query("SELECT * FROM " . $this->table);
        return $this->database->resultSet();
    }

    public function getCharacterById($id)
    {
        $this->database->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->database->bind("id", $id);
        return $this->database->single();
    }

    public function addDataCharacter($data)
    {
        $query = "INSERT INTO characters
                        VALUES
                        ('', :name, :nickname, :anime, :manga, :seiyuu, :description)";

        $this->database->query($query);
        $this->database->bind("name", $data["name"]);
        $this->database->bind("nickname", $data["nickname"]);
        $this->database->bind("anime", $data["anime"]);
        $this->database->bind("manga", $data["name"]);
        $this->database->bind("seiyuu", $data["seiyuu"]);
        $this->database->bind("description", $data["description"]);

        $this->database->execute();

        return $this->database->rowCount();
    }

    public function deleteDataCharacter($id)
    {
        $query = "DELETE FROM characters WHERE id = :id";
        $this->database->query($query);
        $this->database->bind("id", $id);

        $this->database->execute();

        return $this->database->rowCount();
    }

    public function editDataCharacter($data)
    {
        $query = "UPDATE characters SET
                    name = :name,
                    nickname = :nickname,
                    anime = :anime,
                    manga = :manga,
                    seiyuu = :seiyuu,
                    description = :description
                WHERE id = :id";

        $this->database->query($query);
        $this->database->bind("name", $data["name"]);
        $this->database->bind("nickname", $data["nickname"]);
        $this->database->bind("anime", $data["anime"]);
        $this->database->bind("manga", $data["name"]);
        $this->database->bind("seiyuu", $data["seiyuu"]);
        $this->database->bind("description", $data["description"]);
        $this->database->bind("id", $data["id"]);

        $this->database->execute();

        return $this->database->rowCount();
    }

    public function searchCharacter()
    {
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM characters WHERE 
            name LIKE :keyword OR
            nickname LIKE :keyword OR
            anime LIKE :keyword OR
            manga LIKE :keyword OR
            seiyuu LIKE :keyword OR
            description LIKE :keyword";

        $this->database->query($query);
        $this->database->bind("keyword", "%$keyword%");

        return $this->database->resultSet();
    }
}
