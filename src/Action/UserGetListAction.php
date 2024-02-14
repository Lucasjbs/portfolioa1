<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;

class UserGetListAction
{
    private Request $request;
    private User $user;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = new User();
    }

    function __invoke()
    {
        $userList = $this->user->getAllUsers();

        return $userList;
    }
}