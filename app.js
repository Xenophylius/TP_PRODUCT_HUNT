console.log("coucou");

console.log(element.dataset.id);

// Changer la couleur 

function changeColor() {
    let bgMain = document.querySelector(':root')
    bgMain.style.setProperty('--main-color', '#2C439B')
    bgMain.style.setProperty('--second-color', '#33C7F7')
}