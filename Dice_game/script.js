const nouveau = document.querySelector("#btn1");
const lance = document.querySelector("#btn2")
const passe = document.querySelector("#btn3")
const score1 = document.querySelector("#s1")
const score2 = document.querySelector("#s2")
const total1 = document.querySelector("#t1")
const total2 = document.querySelector("#t2")
const images = document.querySelector("#img");
const paly1 = document.querySelector(".j1");
const paly2 = document.querySelector(".j2");
const player1 = document.querySelector(".play1")
const player2 = document.querySelector(".play2")


let a = 0;
let v = 0;
let b = 0;
let v2 = 0;
let b2 = 0;
let count = 3;
let count1 = 3;
let chance1;
let chance2;

function Play() {
    if (count == 0 && count1 == 0) {
        count = 3;
        count1 = 3;
        chance1 = true;
        chance2 = true;
    }
    let x = Math.floor(Math.random() * 7);
    let s = "image/" + "i" + x + ".jpeg";
    images.setAttribute("src", s);

    if (count > 0) {
        for (count; count > 0;) {
            if (x != 1) {
                v = x;
                score1.textContent = x;
                b = b + v;
                total1.textContent = b;
                count--;
                chance1 = true;
                player1.style.backgroundColor = "rgb(160, 160, 160)";
                player2.style.backgroundColor = "white";
                player1.style.color = "green"
                player2.style.color = "black"
                break;
            }
            else if (x == 1) {
                score1.textContent = x;
                total1.textContent = 0;
                b = 0;
                v = 0;
                count = 0;
                count1 = 3;
                chance1 = false;
                chance2 = true;
                player2.style.backgroundColor = "rgb(160, 160, 160)";
                player1.style.backgroundColor = "white";
                player2.style.color = "green"
                player1.style.color = "black"
                break;
            }
        }
    }
    else if (count1 > 0) {
        for (count1; count1 > 0; count1--) {
            if (x != 1) {
                v2 = x;
                score2.textContent = x;
                b2 = b2 + v2;
                total2.textContent = b2;
                count1--;
                chance2 = true;
                player2.style.backgroundColor = "rgb(160, 160, 160)";
                player1.style.backgroundColor = "white";
                player2.style.color = "green"
                player1.style.color = "black"
                break;
            }
            else {
                score2.textContent = x;
                total2.textContent = 0;
                b2 = 0;
                count1 = 0;
                count = 3;
                v2 = 0;
                chance2 = false;
                chance1 = true;
                player1.style.backgroundColor = "rgb(160, 160, 160)";
                player2.style.backgroundColor = "white";
                player1.style.color = "green"
                player2.style.color = "black"
                break;
            }

        }
    }
    win();
}
lance.addEventListener("click", Play);


function changePlayer() {
    if (chance1 == true) {
        count = 0;
        count1 = 3;
        player2.style.backgroundColor = "rgb(160, 160, 160)";
        player1.style.backgroundColor = "white";
        player2.style.color = "green"
        player1.style.color = "black"
    }
    if (chance2 == true) {
        count = 0;
        count1 = 3;
        player1.style.backgroundColor = "rgb(160, 160, 160)";
        player2.style.backgroundColor = "white";
        player1.style.color = "green"
        player2.style.color = "black"
    }
}
passe.addEventListener("click", changePlayer)

nouveau.addEventListener("click", clear)

function clear() {
    score1.textContent = 0;
    total1.textContent = 0;
    score2.textContent = 0;
    total2.textContent = 0;
    v = 0;
    b = 0;
    v2 = 0;
    b2 = 0;
    count = 0;
    count1 = 0;
    player1.style.backgroundColor = "white";
    player2.style.backgroundColor = "white";
    player1.style.color = "black"
    player2.style.color = "black"
    lance.addEventListener("click", Play);
    passe.addEventListener("click", changePlayer)

}


function win() {
    if (total1.textContent > 10 && total2.textContent < 10) {
        score1.textContent = "You win!!";
        score2.textContent = "You Lose!!";
        total1.textContent = "❤";
        total2.textContent = "🖤"
        lance.removeEventListener("click", Play);
        passe.removeEventListener("click", changePlayer)
    }
    if (total2.textContent > 10 && total1.textContent < 10) {
        score1.textContent = "You win!!";
        score2.textContent = "You Lose!!";
        total2.textContent = "🤍"
        total1.textContent = "🖤"
        lance.removeEventListener("click", Play);
        passe.removeEventListener("click", changePlayer)

    }
}


