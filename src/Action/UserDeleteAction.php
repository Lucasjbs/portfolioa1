<?php

namespace Portifolio\Interaction\Action;

use Portifolio\Interaction\Model\User;

class UserDeleteAction
{
    private Request $request;
    private User $user;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function __invoke(int $id)
    {
        $this->user = new User();
        $this->user->deleteUser($id);

        return "Status: success";
    }
}