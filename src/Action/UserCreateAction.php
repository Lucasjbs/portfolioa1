<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;

class UserCreateAction
{
    private Request $request;
    private User $user;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function __invoke(string $newUserName)
    {
        $name = htmlspecialchars(trim($newUserName));

        $this->user = new User($name);
        $this->user->createNewUser();

        return "Status: success";
    }
}