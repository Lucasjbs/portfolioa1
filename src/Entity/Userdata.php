<?php

namespace Portifolio\Interaction\Entity;

use Portifolio\Interaction\Action\Request;

class Userdata extends Connection
{
    private string $tablename = "userdata";

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(): array
    {
        //try
        $result = $this->conn->query("SELECT * FROM $this->tablename");
        $list = $result->fetch_all(MYSQLI_ASSOC);
        return $list;
    }

    public function createNewUser(string $name): string
    {
        $sql = "INSERT INTO $this->tablename (name) VALUES ('$name')";

        //try
        $this->conn->query($sql);
        return "Status: success";
    }

    public function editUserData(int $id, string $name): string
    {
        $sql = "UPDATE $this->tablename SET name = '$name' WHERE id = $id";

        //try
        $this->conn->query($sql);
        return "Status: success";
    }

    public function deleteUser(int $id): string
    {
        $sql = "DELETE FROM userdata WHERE id = $id";

        //try
        $this->conn->query($sql);
        return "Status: success";
    }
}
