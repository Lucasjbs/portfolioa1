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
    $names = '<ul>';

    foreach ($result as $value) {
        $id = $value['id'];
        $name = $value['name'];

        $name = htmlspecialchars($name);

        $names .= '<li>' . $name . '
                <span class="edit-delete-buttons">
                    <button onclick="editName(' . $id . ', \'' . $name . '\')">Edit</button>
                    <button onclick="deleteName(' . $id . ')">Delete</button>
                </span>
            </li>';
    }
    $names .= '</ul>';
    echo $names;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'fetch') {
    $newRequest = new Request('GET', 'fetch', true);
    $getUsersList = new UserGetListAction($newRequest);
    $result = $getUsersList();

    UserDataFrontEndList($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $newRequest = new Request('POST', 'store', true);
    $getUsersList = new UserCreateAction($newRequest);
    $getUsersList($_POST['name']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'edit') {
    $newRequest = new Request('POST', 'edit', true);
    $getUsersList = new UserEditAction($newRequest);
    $getUsersList($_POST['id'], $_POST['name']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    $newRequest = new Request('POST', 'delete', true);
    $getUsersList = new UserDeleteAction($newRequest);
    $getUsersList($_POST['id']);
}
