<?php

namespace Portifolio\Interaction\Entity;

use Exception;
use Portifolio\Interaction\Action\Request;
use Throwable;

class Userdata extends Connection
{
    private string $tablename = "userdata";

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(): array
    {
        $sql = "SELECT * FROM $this->tablename";

        try {
            $result = $this->conn->query($sql);
            $list = $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            $exception = $e->getMessage();
            return [];
        }
        return $list;
    }

    public function createNewUser(string $name, ?int $age, bool $isMarried, string $phone): string
    {
        $isMarried = (int) $isMarried;
        $sql = "INSERT INTO $this->tablename (name, age, is_married, phone) VALUES ('$name', $age, $isMarried, '$phone')";

        try {
            $this->conn->query($sql);
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return "Status: success";
    }

    public function editUserData(int $id, string $name, ?int $age, bool $isMarried, string $phone): string
    {
        $isMarried = (int) $isMarried;
        $sql = "UPDATE $this->tablename SET name = '$name', age = $age, is_married = $isMarried, phone = '$phone' WHERE id = $id";

        try {
            $this->conn->query($sql);
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return "Status: success";
    }

    public function deleteUser(int $id): string
    {
        $sql = "DELETE FROM userdata WHERE id = $id";

        try {
            $this->conn->query($sql);
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return "Status: success";
    }
}
