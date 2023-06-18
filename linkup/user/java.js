//Form Edit profile
Edit = document.querySelectorAll(".edit-profile")

Edit.forEach(() => {
    document.getElementById('edit-profile').style.display = 'none';
     })

function openEdit() {
    document.getElementById('edit-profile').style.display = 'block';
}
    
function closeEdit() {
    document.getElementById('edit-profile').style.display = 'none';
}