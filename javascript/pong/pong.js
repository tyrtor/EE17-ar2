/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");
const eForm = document.querySelector("form");
const eNamn = document.querySelector("#namn");
const knappStart = document.querySelector("#start");
const knappStop = document.querySelector("#stop");
const ePoäng = document.querySelector("#poäng");
const eHighscore = document.querySelector("#highscore");
const eSmash = document.querySelector("#smash");
const eStuds = document.querySelector("#studs");

/* Ställ in bredd och storlek */
eCanvas.width = 600;
eCanvas.height = 500;

/* Globala variabler */
var ctx = eCanvas.getContext("2d");
var boll = {
    radie: 15,
    x: 200,
    y: 200,
    dx: 1,
    dy: 1
};
var racket = {
    x: 10,
    y: 0,
    ned: false,
    upp: false,
    bredd: 20,
    höjd: 100
};
var startFlagga = false;
var poäng = 0;

/* hämta highscore */
lasaHighscore();

/* Skapa ljudobjekt */
studs = new Audio("./studs.wav");
smash = new Audio("./smash.wav");

/* Starta spelet när vi trycker på Start */
eForm.addEventListener("submit", function(e) {
    e.preventDefault();

    if (!startFlagga) {
        startFlagga = true;
        reset();
        sparaNamn();
    }
});

/* Stanna spelet när man trycker på Stop */
knappStop.addEventListener("click", function() {
    startFlagga = false;
});

/* Lyssna på tangenter */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowUp":
            racket.upp = true;
            break;
        case "ArrowDown":
            racket.ned = true;
            break;
    }
});
window.addEventListener("keyup", function(e) {
    switch (e.key) {
        case "ArrowUp":
            racket.upp = false;
            break;
        case "ArrowDown":
            racket.ned = false;
            break;
    }
});

/* Startvärden */
ctx.fillStyle = "#FFF";
function reset() {
    boll.x = Math.random() * 500 + 50;
    boll.y = Math.random() * 400 + 50;
    boll.dx = Math.random() * 5;
    boll.dy = Math.random() * 5;
    animate();
}

/* Ritar en boll */
function ritaBoll() {
    ctx.beginPath();
    ctx.arc(boll.x, boll.y, boll.radie, 0, Math.PI * 2);
    ctx.fill();
}

/* Ritar en racket */
function ritaRacket() {
    ctx.beginPath();
    ctx.fillRect(racket.x, racket.y, racket.bredd, racket.höjd);
}

/* Game Over */
function gameOver() {
    ctx.beginPath();
    ctx.font = "bold 70px Sans-serif";
    ctx.fillStyle = "#FFF";
    ctx.textAlign = "center";
    ctx.fillText("Game Over!", 300, 200);
    sparaPoäng();
}

/* Animationsloopen */
function animate() {
    /* Tömma skärmen */
    ctx.clearRect(0, 0, 600, 500);

    /* Rita bollen */
    ritaBoll();

    /* Rita racketen */
    ritaRacket();

    /* Flytta racketen */
    if (racket.ned) {
        if (racket.y < 500 - racket.höjd) {
            racket.y += 5;
        }
    }
    if (racket.upp) {
        if (racket.y > 0) {
            racket.y -= 5;
        }
    }

    /* Bollen skall studsa på racketen */
    if (boll.y >= racket.y && boll.y <= racket.y + racket.höjd) {
        if (boll.x - boll.radie <= racket.x + racket.bredd) {
            //console.log("Träff!", poäng);
            boll.dx = -boll.dx;
            poäng++;

            /* Skriv poängen direkt */
            ePoäng.textContent = poäng;

            /* Öka hastigheten (svårighetsgraden) */
            boll.dx++;
            boll.dy++;

            eSmash.play();
        }
    }

    /* Bollen träffar väggen bakom racketen = Game Over! */
    if (boll.x <= -boll.radie) {
        console.log("Game Over!", boll.x);
        startFlagga = false;
        gameOver();
    }

    /* Studsa tillbaka från höger/vänsterkanten */
    if (boll.x > 600 - boll.radie) {
        boll.dx = -boll.dx;
        eStuds.play();
    }
    /* Studsa tillbaka från vänsterkanten */
    if (boll.y < boll.radie || boll.y > 500 - boll.radie) {
        boll.dy = -boll.dy;
    }

    /* Förflytta bollen */
    boll.x += boll.dx;
    boll.y += boll.dy;

    /* Här kan vi pausa spelet */
    if (startFlagga) {
        requestAnimationFrame(animate);
    }
}

function sparaNamn() {
    var namn = eNamn.value;
    console.log("Namn= ",namn);

    /* låser input-rutan */
    eNamn.readOnly;

    /* Skapa ajax för att kunna skicka data */
    var ajax = new XMLHttpRequest();

    /* Omvandla data till POST */
    var postData = new FormData();
    postData.append("namn", namn);
    

    /* skicka data */
    ajax.open("POST", "./spara-namn.php")
    ajax.send(postData);

    /* ta emot svaret */
    ajax.addEventListener("loadend", function () {
        console.log("Tar emot svar: ", this.responseText);
        
    })
}

function sparaPoäng() {
    var namn = eNamn.value;
    console.log(poäng);

    var ajax = new XMLHttpRequest();

    var postData = new FormData();
    postData.append("namn", namn);
    postData.append("poäng", poäng);

    ajax.open("POST", "./spara-poäng.php")
    ajax.send(postData);

    ajax.addEventListener("loadend", function () {
        console.log("Tar emot svar: ", this.responseText);
        
    })
}
function lasaHighscore() {
        var ajax = new XMLHttpRequest();

        ajax.open("POST", "./lasa-highscore.php")
        ajax.send();

        /* ta emot svaret */
        ajax.addEventListener("loadend", function () {
            console.log("Tar emot svar: ", this.responseText);
            eHighscore.innerHTML = this.responseText;
        })
}