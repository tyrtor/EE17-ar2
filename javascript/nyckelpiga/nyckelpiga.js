/* element vi jobbar med */
const eCanvas = document.querySelector("canvas");
const ePoäng = document.querySelector("#poäng");

/* ställ in storlek på canvas */
eCanvas.width = 800;
eCanvas.height = 600;

/* globala variabler */
var ctx = eCanvas.getContext("2d");
var poäng = 0;

/* skapa piga, monster och mynt */
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}
var karta = [
    [13, 0, 11, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12,],
    [13, 0, 55, 0, 56, 0, 55, 0, 55, 0, 55, 0, 0, 0, 0, 11,],
    [13, 0, 56, 0, 0, 0, 55, 0, 56, 0, 56, 0, 32, 34, 0, 11,],
    [13, 0, 0, 0, 54, 0, 55, 0, 0, 0, 0, 0, 0, 0, 0, 11,],
    [13, 0, 1, 33, 55, 0, 55, 33, 2, 33, 3, 0, 54, 0, 0, 11,],
    [13, 0, 55, 0, 55, 0, 56, 0, 55, 0, 56, 0, 55, 34, 0, 11,],
    [13, 0, 55, 0, 55, 0, 0, 0, 55, 0, 0, 0, 55, 0, 0, 11,],
    [13, 0, 55, 0, 55, 0, 54, 0, 55, 0, 54, 0, 55, 0, 0, 11,],
    [13, 0, 56, 0, 55, 0, 11, 33, 23, 0, 11, 33, 12, 34, 0, 11,],
    [13, 0, 0, 0, 55, 0, 56, 0, 0, 0, 55, 0, 55, 0, 0, 21,],
    [13, 0, 54, 0, 55, 0, 0, 0, 54, 0, 55, 0, 55, 0, 0, 0,],
    [12, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2,]
];
var monster1 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 250),
    bild: new Image()
};

var monster2 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 250),
    bild: new Image()
};

var mynt1 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 250),
    bild: new Image()
};

/* spelets variabler */
var isGameOver = false

/* Lagra alla monster i en array */
var monsters = [];
monsters.push(monster1);
monsters.push(monster2);

/* lagra alla mynt i en array */
var mynten = [];
mynten.push(mynt1);

/* nyckelpigans startläge */
piga.rad = 0;
piga.kol = 1;
piga.bild.src = "./nyckelpiga.png";

/* monster bild */
monster1.bild.src = "./monster.png";
monster2.bild.src = "./monster.png";

/* Ge mynten en bild */
mynt1.bild.src = "./coin-sprite.png";

/* ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./Tileset.png";

/* starta spelet */
gameLoop();

/* funktionerna */

/* rita ut pigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot * (Math.PI / 180));
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}
/* rita ut kartan */
function ritaKarta() {
    /* gå igenom varje rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* gå igenom varje kolumn */
        for (let kol = 0; kol < karta[rad].length; kol++) {
            if (karta[rad][kol] != 0) {
                /* rita ut en svart ruta */
                var rutaPos = (karta[rad][kol] % 10) * 32 - 32;
                var rutaPosRad = Math.ceil(karta[rad][kol] / 10) * 32 - 32;
                ctx.drawImage(tileSheet, rutaPos, rutaPosRad, 32, 32, kol * 50, rad * 50, 50, 50);
            }
        }
    }
}

/* gameover */
function gameOver() {
    ctx.font = "bold 96px sans-serif";
    ctx.fillStyle = "#fff";
    ctx.fillText("Game Over!", 200, 200);
}

/* rita ut monster */
function ritaMonster(figur) {
    ctx.drawImage(figur.bild, figur.x, figur.y, 50, 50);
    figur.y++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

function krock(figur) {
    var px = piga.kol * 50;
    var py = piga.kol * 50 + 25;
    if (py < figur.y && figur.y < py + 50) {
        if (px < figur.x && figur.x < px + 50) {
            isGameOver = true;
        }
    }
}

function ritaMynt(figur) {
    ctx.drawImage(figur.bild, 0, 0, 50, 50, figur.x, figur.y, 50, 50);
    figur.y++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

function plockaMynt(figur) {
    var px = piga.kol * 50;
    var py = piga.kol * 50 + 25;
    if (py < figur.y && figur.y < py + 50) {
        if (px < figur.x && figur.x < px + 50) {
            ctx.font = "bold 96px sans-serif";
            ctx.fillStyle = "#fff";
            ctx.fillText("+1", 200, 200);
            figur.y = -Math.ceil(Math.random() * 250);
            figur.x = Math.ceil(Math.random() * 750);
            poäng++;
            console.log("träff!", poäng);
            ePoäng.textContent = poäng;

        }
    } 
}

/* spara poäng */

/* Lyssna på pilarna */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;
            }
            piga.rot = 90;
            break;

        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = 270;
            break;

        case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++;
            }
            piga.rot = 180;
            break;

        case "ArrowUp":
            if (karta[piga.rad - 1][piga.kol] == 0) {
                piga.rad--;
            }
            piga.rot = 0;
            break;

    }
});

/* spel loopen */
function gameLoop() {
    /* rensa skärmen */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);
    ritaKarta();
    /* för varje mynt */
    mynten.forEach(ritaMynt);
    mynten.forEach(plockaMynt);
    ritaPiga();
    /* för varje monster */
    monsters.forEach(ritaMonster);
    monsters.forEach(krock);

    if (!isGameOver) {
        requestAnimationFrame(gameLoop);
    }else{
        gameOver();
    }
    
}