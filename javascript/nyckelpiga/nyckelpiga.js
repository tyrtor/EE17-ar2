/* element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* ställ in storlek på canvas */
eCanvas.width = 800;
eCanvas.height = 600;

/* globala variabler */
var ctx = eCanvas.getContext("2d");
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}
var karta = [
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1,],
    [1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1,],
    [1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1,],
    [1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1,],
    [1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1,],
    [1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1,],
    [1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0,],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,]
];

/* nyckelpigans startläge */
piga.rad = 0;
piga.kol = 1;
piga.bild.src = "./nyckelpiga.png";

/* ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet.png";

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
            if (karta[rad][kol] == 1) {
                /* rita ut en svart ruta */
                var rutaPos = karta[rad][kol] * 32
                ctx.drawImage(tileSheet, rutaPos, 0, 32, 32, kol * 50, rad * 50, 50, 50);
            }
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

    requestAnimationFrame(gameLoop);
}

/* starta spelet */
gameLoop();