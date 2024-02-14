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

    function __invoke(
        string $newUserName,
        ?int $age,
        bool $isMarried,
        string $phone
    ) {
        $name = htmlspecialchars(trim($newUserName));

        $this->user = new User($name, $age, $isMarried, $phone);
        $this->user->createNewUser();

        return "Status: success";
    }
}
