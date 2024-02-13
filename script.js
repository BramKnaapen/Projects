let player1Choice = "";
let player2Choice = "";

function playerChoice(choice, player) {
    if (player === "player1") {
        player1Choice = choice;

        document.getElementById("gekozen").innerHTML = "Player 1 heeft gekozen";
        console.log("Player 1 heeft: " + choice + " gekozen");

        document.getElementById("player1Menu").classList.add("hidden");
        document.getElementById("player1Header").classList.add("hidden");
        document.getElementById("player2Menu").classList.add("hidden");
        document.getElementById("player2Header").classList.add("hidden");
    } else {
        player2Choice = choice;
        document.getElementById("gekozen2").innerHTML = "Player 2 heeft gekozen";
        console.log("Player 2 heeft: " + choice + " gekozen");

        determineOutcome();
    }
}

function determineOutcome() {
    if (player1Choice == player2Choice) {
        document.getElementById("result").innerHTML = "Gelijkspel";
    } else if (player1Choice == "rock" && player2Choice == "scissors") {
        document.getElementById("result").innerHTML = "Player 1 wins";
    } else if (player1Choice == "paper" && player2Choice == "rock") {
        document.getElementById("result").innerHTML = "Player 1 wins";
    } else if (player1Choice == "scissors" && player2Choice == "paper") {
        document.getElementById("result").innerHTML = "Player 1 wins";
        console.log("Player 1 wins");
    } else {
        document.getElementById("result").innerHTML = "Player 2 wins";
        console.log("Player 2 wins");
    }
}
