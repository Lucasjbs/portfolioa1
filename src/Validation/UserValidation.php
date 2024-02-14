<?php

namespace Portifolio\Interaction\Validation;

use Portifolio\Interaction\Action\Request;
use Portifolio\Interaction\Exceptions\InvalidAgeException;
use Portifolio\Interaction\Exceptions\InvalidIdException;
use Portifolio\Interaction\Exceptions\InvalidNameException;
use Portifolio\Interaction\Exceptions\InvalidPhoneException;
use Portifolio\Interaction\Model\User;

class UserValidation
{
    private int $id;
    private User $user;
    private Request $request;

    public function __construct(
        User $user,
        Request $request,
        int $id = 0
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->request = $request;
    }

    public function validate(): bool
    {
        $this->idValidator();
        $this->nameValidator($this->user->getUserName());
        $this->ageValidator($this->user->getUserAge());
        $this->phoneValidator($this->user->getUserPhone());

        return true;
    }

    private function idValidator(): void
    {
        if ($this->isCreateRoute() && $this->id === 0) {
            return;
        }

        if (($this->isEditRoute() || $this->isDeleteRoute()) && preg_match('/^\d+$/', $this->id) && $this->id > 0) {
            return;
        }

        throw new InvalidIdException("Invalid ID for User operation!");
    }

    private function nameValidator(string $name): void
    {
        if (($this->isEditRoute() || $this->isCreateRoute()) && strlen($name) < 3) {
            throw new InvalidNameException("Too few characters for Name!");
        }

        if (strlen($name) > 40) {
            throw new InvalidNameException("Name lenght too large!");
        }

        if (preg_match('/[{}[\]<>;:(),.;\'"%\$]/', $name)) {
            throw new InvalidNameException("Invalid character was used for Name!");
        }

        return;
    }

    private function ageValidator(?int $age): void
    {
        if(!$age) return;

        if(13 <= $age && $age <= 140) return;

        throw new InvalidAgeException("This age number is invalid!");
    }

    private function phoneValidator(string $phone): void
    {
        if(!($this->isCreateRoute() || $this->isEditRoute())) {
            return;
        }elseif (preg_match('/^\d{2} \d{5}-\d{4}$/', $phone)) {
            return;
        }

        throw new InvalidPhoneException("This phone number is not in the correct format!");
    }

    private function isCreateRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'store') return true;

        return false;
    }

    private function isEditRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'edit') return true;

        return false;
    }

    private function isDeleteRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'delete') return true;

        return false;
    }
}
