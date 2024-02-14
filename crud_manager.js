function ajaxPostRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'backend.php',
        async: true,
        data: requestData,
        success: function (response) {
            fetchData();
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function fetchData() {
    var requestData = { "action": "fetch" };

    $.ajax({
        type: 'GET',
        url: 'backend.php',
        async: true,
        data: requestData,
        success: function (response) {
            $('#userList').html(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

fetchData();

function storeUserData() {
    var nameInput = document.getElementById("nameInput").value;
    var ageInput = document.getElementById("ageInput").value;
    var isMarried = document.getElementById("maritalStatus").value;
    var phoneInput = document.getElementById("phoneInput").value;
    var requestData = {
        "action": "store",
        "name": encodeURIComponent(nameInput),
        "age": ageInput,
        "isMarried": isMarried,
        "phone": phoneInput,
    };

    ajaxPostRequest(requestData);
}

function editUser(id, currentName, currentAge, maritalStatus, currentPhone) {
    var confirmEdit = confirm("Are you sure you want to edit this user?");
    if (confirmEdit) {
        var newName = prompt("Edit name:", currentName);
        var newAge = prompt("Edit age:", currentAge);
        var newMaritalStatus = prompt("Edit Marital Status:", maritalStatus);
        var newPhone = prompt("Edit phone:", currentPhone);
        var requestData = {
            "action": "edit",
            "id": id,
            "name": encodeURIComponent(newName),
            "age": newAge,
            "isMarried": newMaritalStatus,
            "phone": newPhone,
        };

        ajaxPostRequest(requestData);
    }
}

function deleteUser(id) {
    var confirmDelete = confirm("Are you sure you want to delete this name?");

    if (confirmDelete) {
        var requestData = { "action": "delete", "id": id };

        ajaxPostRequest(requestData);
    }
}
