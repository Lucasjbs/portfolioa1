function ajaxPostRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'backend.php',
        async: true,
        data: requestData,
        success: function (response) {
            fetchNames();
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function fetchNames() {
    var requestData = { "action": "fetch" };

    $.ajax({
        type: 'GET',
        url: 'backend.php',
        async: true,
        data: requestData,
        success: function (response) {
            $('#nameList').html(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

fetchNames();

function storeName() {
    var nameInput = document.getElementById("nameInput").value;
    var requestData = { "action": "store", "name": encodeURIComponent(nameInput) };

    ajaxPostRequest(requestData);
}

function editName(id, currentName) {
    var newName = prompt("Edit name:", currentName);
    var requestData = { "action": "edit", "id": id, "name": encodeURIComponent(newName) };

    ajaxPostRequest(requestData);
}

function deleteName(id) {
    var confirmDelete = confirm("Are you sure you want to delete this name?");

    if (confirmDelete) {
        var requestData = { "action": "delete", "id": id };

        ajaxPostRequest(requestData);
    }
}
