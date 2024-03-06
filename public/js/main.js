
function OpenAddCategory() {
    document.getElementById('AddCategory').classList.remove('hidden');
}

// Function to close the modal
function CloseAddCategory() {
    document.getElementById('AddCategory').classList.add('hidden');
}
function OpenDeleteCategory(id) {
document.getElementById(`DeleteCategory${id}`).classList.remove('hidden');
}

function closeDeleteCategory(id){
document.getElementById(`DeleteCategory${id}`).classList.add('hidden');
}
function OpenEditCategory(id) {
document.getElementById(`EditCategory${id}`).classList.remove('hidden');
}

function CloseEditCategory(id) {
document.getElementById(`EditCategory${id}`).classList.add('hidden');
}




function updateCurrentTime() {
    var now = new Date();
    
    var formattedDate = ('0' + now.getDate()).slice(-2) + '/' + ('0' + (now.getMonth() + 1)).slice(-2) + '/' + now.getFullYear();
    var formattedTime = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
    
    document.getElementById('current-time').textContent = formattedDate + ' ' + formattedTime;
}
setInterval(updateCurrentTime, 1000);
updateCurrentTime();



