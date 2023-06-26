SuppContainer = document.querySelectorAll("#delete")

//TAGS

//on appelle la fonction pour le bouton 'all'
filterSelection("all")

//2 variables : x prend tous les éléments de la classe filterDiv (les postes avec le tag)
// si c = all; on fait rien
//x.length : on prend le total des postes contenant le tag
// et on enlève la classe 'show' pour tous les éléments sans le tag
// puis pour chaque poste, on met la classe 'show' si la classe existe
//indexOf = change le string en int

function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
//arr1 : on prend les éléments qui ont le tag puis on en fait un tableau (split à chaque espace)
//arr2 : show
//on prend le length du tableau de arr2
//on vérifie si le show est déjà présent ou non dans les éléments de arr1 et si
//non, on l'ajoute dans l'html
// -1 = pas présent
// += concatenation des strings/booleans (ex : true = 1)


function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

//Ajoute la classe 'active' sur le bouton tag cliqué
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}




//Form Supprimer

function closePopup() {
  document.querySelector('#delete').style.display = 'none';
}

// Gestion des modal
let trash = document.querySelectorAll('.trash')

if(trash != null) {
 
  trash.forEach(function(item) {

    item.addEventListener('click', function(e) {
      e.preventDefault() // Eviter que cela se comporte comme un lien
      item.closest('.post-content').querySelector('form').style.display = 'block'
    })
  })
}