
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
function closePopup() {
    document.getElementById(`eventSearch`).classList.add('hidden');
    }
    

    const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }


    
      
      
      function openToReserve() {
      document.getElementById('reserve').classList.remove('hidden');
      }
      
      function closeReserve(){
      document.getElementById('reserve').classList.add('hidden');
      }
