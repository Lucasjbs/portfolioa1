<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;

class UserEditAction
{
    private Request $request;
    private User $user;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function __invoke(int $id, string $newUserName)
    {
        $name = htmlspecialchars(trim($newUserName));

        $this->user = new User($name);
        $this->user->editUserData($id);

        return "Status: success";
    }
}