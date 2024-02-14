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

    function __invoke(
        int $id,
        string $newUserName,
        ?int $age,
        bool $isMarried,
        string $phone
    ) {
        $name = htmlspecialchars(trim($newUserName));

        $this->user = new User($name, $age, $isMarried, $phone);
        $this->user->editUserData($id);

        return "Status: success";
    }
}
