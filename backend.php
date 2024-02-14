<?php
require 'autoload.php';

use Portifolio\Interaction\Action\Request;
use Portifolio\Interaction\Action\UserCreateAction;
use Portifolio\Interaction\Action\UserDeleteAction;
use Portifolio\Interaction\Action\UserEditAction;
use Portifolio\Interaction\Action\UserGetListAction;

// Should move this to another file later
function UserDataFrontEndList(array $result): void
{
    $userList = '<ul>';

    foreach ($result as $value) {
        $id = $value['id'];
        $name = $value['name'];
        $isMarried = $value['is_married'];
        $age = $value['age'];
        $phone = $value['phone'];

        $name = htmlspecialchars($name);
        $maritalStatus = 'Single';
        if ($isMarried == 1) $maritalStatus = 'Married';

        $userData = "$name, $age, $maritalStatus, $phone";

        $userList .= '<li>' . $userData . '
                <span class="edit-delete-buttons">
                    <button onclick="editUser(' . $id . ', \'' . $name . '\', ' . $age . ', ' . $isMarried . ', \'' . $phone . '\')">Edit</button>
                    <button onclick="deleteUser(' . $id . ')">Delete</button>
                </span>
            </li>';
    }
    $userList .= '</ul>';
    echo $userList;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'fetch') {
    $newRequest = new Request('GET', 'fetch', true);
    $getUsersList = new UserGetListAction($newRequest);
    $result = $getUsersList();

    UserDataFrontEndList($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $newRequest = new Request('POST', 'store', true);
    $getUsersList = new UserCreateAction(
        $newRequest,
        $_POST['name'],
        $_POST['age'] ? $_POST['age'] : null,
        $_POST['isMarried'],
        $_POST['phone']
    );
    $getUsersList();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'edit') {
    $newRequest = new Request('POST', 'edit', true);
    $getUsersList = new UserEditAction(
        $newRequest,
        $_POST['id'],
        $_POST['name'],
        $_POST['age'],
        $_POST['isMarried'],
        $_POST['phone']
    );
    $getUsersList();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    $newRequest = new Request('POST', 'delete', true);
    $getUsersList = new UserDeleteAction($newRequest, $_POST['id']);
    $getUsersList();
}
