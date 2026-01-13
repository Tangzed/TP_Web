"use strict";

// Définition des constantes
let MESSAGES = {
    'message1': 'Bienvenue sur notre jeu.',
    'message2': ' vous avez gagné !'
};

const PLAYER1 = "✓";
const PLAYER2 = "X";

// Fonction principale lancée au chargement
function main() {
    // Affichage  messages de bienvenue
    console.log(MESSAGES.message1);
    alert(MESSAGES.message1);

    // Listener clic sur les 9 cases
    for (let i = 0; i <= 8; i++) {
        let cell = document.getElementById('cell' + i);
        if (cell) {
            cell.addEventListener('click', fill);
        }
    }

    // Listener bouton "Vérifier" (id="play")
    let verifyBtn = document.getElementById('play');
    if (verifyBtn) {
        verifyBtn.addEventListener('click', verify);
    }

    // Initialisation timer
    let start = new Date();
    setInterval(function() {
        updateTimer(start);
    }, 1000);
}

// Fonction pour remplir les cases
function fill(event) {
    let cell = event.target;

    if (cell.innerHTML === "" || cell.innerHTML === PLAYER2) {
        cell.innerHTML = PLAYER1;
        cell.style.color = "green";
    } else {
        cell.innerHTML = PLAYER2;
        cell.style.color = "red";
    }
}

// Vérification victoire
function verifyPlayer(playerMark) {
    const winConditions = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Lignes
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Colonnes
        [0, 4, 8], [2, 4, 6]             // Diagonales
    ];

    for (let condition of winConditions) {
        let val0 = document.getElementById('cell' + condition[0]).innerHTML;
        let val1 = document.getElementById('cell' + condition[1]).innerHTML;
        let val2 = document.getElementById('cell' + condition[2]).innerHTML;

        if (val0 === playerMark && val1 === playerMark && val2 === playerMark) {
            return true;
        }
    }
    return false;
}

//  bouton vérifier
function verify() {
    // Récupération des noms 
    let name1 = document.getElementsByName('player1')[0].value || "Joueur 1";
    let name2 = document.getElementsByName('player2')[0].value || "Joueur 2";

    if (verifyPlayer(PLAYER1)) {
        alert("Bravo " + name1 + MESSAGES.message2);
        addScore(name1);
        resetBoard();
    } else if (verifyPlayer(PLAYER2)) {
        alert("Bravo " + name2 + MESSAGES.message2);
        addScore(name2);
        resetBoard();
    }
}

// Ajout ligne tableau des scores
function addScore(name) {
    let table = document.getElementById('scores');
    let row = table.insertRow(-1);
    let cellName = row.insertCell(0);
    let cellDate = row.insertCell(1);

    cellName.innerHTML = name;
    cellDate.innerHTML = new Date().toLocaleString();
}

// MAJ Affichage timer
function updateTimer(start) {
    let now = new Date();
    let diff = Math.floor((now - start) / 1000);
    
    let minutes = Math.floor(diff / 60);
    let seconds = diff % 60;
    
    let display = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);
    let timerElement = document.getElementById('timer');
    if (timerElement) {
        timerElement.innerHTML = display;
    }
}

// Nettoyage plateau 
function resetBoard() {
    for (let i = 0; i <= 8; i++) {
        let cell = document.getElementById('cell' + i);
        cell.innerHTML = "";
        cell.style.color = "";
    }
}

window.onload = main;