<?php

namespace Portifolio\Interaction\Model;

use Portifolio\Interaction\Entity\Userdata;

class User
{
    private string $name;
    private ?int $age;
    private bool $isMarried;
    private string $phone;
    private Userdata $userEntity;

    public function __construct(
        string $name = "",
        ?int $age = null,
        bool $isMarried = false,
        string $phone = "",
    ) {
        $this->name = $name;
        $this->age = $age;
        $this->isMarried = $isMarried;
        $this->phone = $phone;
        $this->userEntity = new Userdata;
    }

    public function getAllUsers(): array
    {
        $result = $this->userEntity->getAllUsers();
        return $result;
    }

    public function createNewUser(): void
    {
        $this->userEntity->createNewUser(
            $this->name,
            $this->age,
            $this->isMarried,
            $this->phone,
        );
    }

    public function editUserData(int $id): void
    {
        $this->userEntity->editUserData(
            $id,
            $this->name,
            $this->age,
            $this->isMarried,
            $this->phone,
        );
    }

    public function deleteUser(int $id): void
    {
        $this->userEntity->deleteUser($id);
    }
}
