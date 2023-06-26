PostContainer = document.querySelectorAll(".make-post")

//Form ajouter poste
PostContainer.forEach(() => {
    document.getElementById('make-post').style.display = 'none';
     })

function openPost() {
    document.getElementById('make-post').style.display = 'block';
}
    
function closePost() {
    document.getElementById('make-post').style.display = 'none';
}

//NAVBAR
function NavMenu() {
    let x = document.getElementById("side-bar-mobile");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }
