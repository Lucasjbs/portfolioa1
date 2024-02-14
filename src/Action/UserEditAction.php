<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;
use Portifolio\Interaction\Validation\UserValidation;

class UserEditAction
{
    private int $id;
    private Request $request;
    private User $user;

    function __construct(
        Request $request,
        int $id,
        string $name,
        ?int $age,
        bool $isMarried,
        string $phone
    ) {
        $this->user = new User($name, $age, $isMarried, $phone);
        $this->request = $request;
        $this->id = $id;

        $validator = new UserValidation($this->user, $this->request, $id);
        $validator->validate();
    }

    function __invoke()
    {
        $this->user->editUserData($this->id);

        return "Status: success";
    }
}
