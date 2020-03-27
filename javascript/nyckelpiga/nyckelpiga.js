/* element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* ställ in storlek på canvas */
eCanvas.width = 800;
eCanvas.height = 600;

/* globala variabler */
var ctx = eCanvas.getContext("2d");
var gameOver = false
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
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

var monster2 = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* nyckelpigans startläge */
piga.rad = 0;
piga.kol = 1;
piga.bild.src = "./nyckelpiga.png";

/* monster startläge */
monster.x = Math.ceil(Math.random() * 750);
monster.y = 1;
monster.bild.src = "./monster.png";

/* monster2 startläge */
monster2.x = Math.ceil(Math.random() * 750);
monster2.y = 1;
monster2.bild.src = "./monster.png";

/* ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./Tileset.png";

/* rita ut pigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
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

/* rita ut monster */
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y, 50, 50);
    monster.y++;
    if (monster.y > 600) {
        monster.y = 0;
        monster.x = Math.ceil(Math.random() * 750);
    }
}

/* rita ut monster2 */
function ritaMonster2() {
    ctx.drawImage(monster2.bild, monster2.x, monster2.y, 50, 50);
    monster2.y++;
    if (monster2.y > 600) {
        monster2.y = 0;
        monster2.x = Math.ceil(Math.random() * 750);
    }
}

function krock() {
    if ((piga.rad* 50) < monster.y && monster.y < (piga.rad * 50+50)) {
        if ((piga.kol * 50) < monster.x && monster.x < (piga.kol * 50 + 50)) {
            ctx.font = "bold 96px sans-serif";
            ctx.fillStyle = "#fff";
            ctx.fillText("Game Over!", 200, 200);
            gameOver = true;
        }
    }
    if ((piga.rad* 50) < monster2.y && monster2.y < (piga.rad * 50+50)) {
        if ((piga.kol * 50) < monster2.x && monster2.x < (piga.kol * 50 + 50)) {
            ctx.font = "bold 96px sans-serif";
            ctx.fillStyle = "#fff";
            ctx.fillText("Game Over!", 200, 200);
            gameOver = true;
        }
    }
}



/* Lyssna på pilarna */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;
            }
            piga.rot = 90 * (Math.PI / 180);
            break;

        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = -90 * (Math.PI / 180);
            break;

        case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++;
            }
            piga.rot = Math.PI;
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
    ritaPiga();

    ritaMonster();
    ritaMonster2();
    krock();

    if (!gameOver) {
        requestAnimationFrame(gameLoop);
    }
    
}

/* starta spelet */
gameLoop();