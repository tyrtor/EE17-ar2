/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;

/* Objekten i spelet */
var spel = {
    tid: 60,
    poäng: 0,
    isGameOver: false,
    bild: new Image()
};
var hjälte = {
    x: eCanvas.width / 2 ,
    y: eCanvas.height / 2,
    a: 5,
    vänster: false,
    höger: false,
    upp: false,
    ner: false,
    bild: new Image()
};
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* Ladda in bilderna */
spel.bild.src = "./bilder/background.png";
hjälte.bild.src = "./bilder/hero.png";
monster.bild.src = "./bilder/monster.png";

/* Canvas inställningar */


/* Kör igång spelet */
reset();
gameLoop();

/* ********* */
/* Händelser */


/* Lyssna på tangentnedtryckningar */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (hjälte.x < 455) {
                hjälte.x += hjälte.a;
                hjälte.höger = true;
            }
            break;

        case "ArrowLeft":
            if (hjälte.x > 30) {
                hjälte.x -= hjälte.a;
                hjälte.vänster = true;
            }
            break;

        case "ArrowDown":
            if (hjälte.y < 420) {
                hjälte.y += hjälte.a;
                hjälte.ner = true;
            }
            break;

        case "ArrowUp":
            if (hjälte.y > 30) {
                hjälte.y -= hjälte.a;
                hjälte.upp = true
            }
            break;
    }
});
window.addEventListener("keyup", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (hjälte.x < 455) {
                hjälte.höger = false;
            }
            break;

        case "ArrowLeft":
            if (hjälte.x > 30) {
                hjälte.vänster = false;
            }
            break;

        case "ArrowDown":
            if (hjälte.y < 420) {
                hjälte.ner = false;
            }
            break;

        case "ArrowUp":
            if (hjälte.y > 30) {
                hjälte.upp = false;
            }
            break;
    }
});

window.setInterval(function() {
    spel.tid--;

    if (spel.tid <= 0) {
        spel.isGameOver = true;
        ctx.font = "50px Helvetica";
        ctx.fillStyle = "#FF0000";
        ctx.fillText("GAME OVER", 100, 100);
    }

}, 1000);

/* ************ */
/* Funktionerna */

/* Återställ spelet */
function reset() {
    /* Spawna monstret slumpmässigt */
    monster.x = 32 + Math.random() * (eCanvas.width - 100);
    monster.y = 32 + Math.random() * (eCanvas.height - 100);
}

/* Ritar ut */
function ritaBakgrund() {
    ctx.drawImage(spel.bild, 0, 0);
}
function ritaHjälte() {
    if (hjälte.höger) {
        hjälte.x += 3;
    }
    if (hjälte.vänster) {
        hjälte.x -= 3;
    }
    if (hjälte.ner) {
        hjälte.y += 3;
    }
    if (hjälte.upp) {
        hjälte.y -= 3;
    }
    ctx.drawImage(hjälte.bild, hjälte.x, hjälte.y);
}
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
}

/* Kollar om hjälten träffar monstret */
function kollaKollision() {
    /* träffar hjälten monstret */
    if (hjälte.x <= (monster.x + 32) && monster.x <= (hjälte.x + 32) && 
        hjälte.y <= (monster.y + 32) && monster.y <= (hjälte.y + 32)) {
        reset();
        spel.poäng ++;
    }

    /* skriv ut */
    ctx.font = "24px Helvetica"
    ctx.fillStyle = "#fff";
    ctx.fillText("fångade monster: " + spel.poäng, 30, 20);
    ctx.fillText("Tid kvar :" + spel.tid, 30, 50);
}


/* Spelloopen */
function gameLoop() {
    ritaBakgrund();
    ritaHjälte();
    ritaMonster();
    kollaKollision();

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}