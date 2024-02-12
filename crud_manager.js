
// Function to store a name using AJAX
function storeName() {
    var nameInput = document.getElementById("nameInput").value;

    // Make an AJAX request to store the name
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Refresh the name list after storing
            fetchNames();
        }
    };
    xhr.send("action=store&name=" + encodeURIComponent(nameInput));
}

// Function to fetch and display names using AJAX
function fetchNames() {
    // Make an AJAX request to fetch names
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend.php?action=fetch", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the name list
            document.getElementById("nameList").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Initial fetch of names when the page loads
fetchNames();

// Function to edit a name using AJAX
function editName(id, currentName) {
    var newName = prompt("Edit name:", currentName);

    if (newName !== null) {
        // Make an AJAX request to edit the name
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "backend.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Refresh the name list after editing
                fetchNames();
            }
        };
        xhr.send("action=edit&id=" + id + "&name=" + encodeURIComponent(newName));
    }
}

// Function to delete a name using AJAX
function deleteName(id) {
    var confirmDelete = confirm("Are you sure you want to delete this name?");

    if (confirmDelete) {
        // Make an AJAX request to delete the name
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "backend.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Refresh the name list after deleting
                fetchNames();
            }
        };
        xhr.send("action=delete&id=" + id);
    }
}
