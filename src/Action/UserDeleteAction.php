<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;
use Portifolio\Interaction\Validation\UserValidation;

class UserDeleteAction
{
    private int $id;
    private Request $request;
    private User $user;

    function __construct(Request $request, int $id)
    {
        $this->request = $request;
        $this->id = $id;
        $this->user = new User();

        $validator = new UserValidation($this->user, $this->request, $id);
        $validator->validate();
    }

    function __invoke()
    {
        $this->user->deleteUser($this->id);

        return "Status: success";
    }
}