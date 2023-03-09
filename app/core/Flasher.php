<?php
class Flasher
{
    public static function setFlash($msg, $action, $type)
    {
        $_SESSION["flash"] = [
            "message" => $msg,
            "action" => $action,
            "type" => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION["flash"])) {
            echo "<div class=\"alert alert-" . $_SESSION["flash"]["type"] . " alert-dismissible fade show\" role=\"alert\">
            Data character <strong>" . $_SESSION["flash"]["message"] . " " . $_SESSION["flash"]["action"] . "</strong>" . "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";

            unset($_SESSION["flash"]);
        }
    }
}
