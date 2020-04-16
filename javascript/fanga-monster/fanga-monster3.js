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
    bild: new Image(),
    rutIndex: 0,
    rutAntal: 4,
    rutRad: 0
};
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* Ladda in bilderna */
spel.bild.src = "./bilder/background.png";
hjälte.bild.src = "./bilder/pokemon-bald-sprite.png";
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
    /* flytta åt det håll vi tryckt på */
    if (hjälte.höger) {
        hjälte.x += 3;
        hjälte.rutRad = 2;
    }else
    if (hjälte.vänster) {
        hjälte.x -= 3;
        hjälte.rutRad = 1;
    }else
    if (hjälte.ner) {
        hjälte.y += 3;
        hjälte.rutRad = 0;
    }else
    if (hjälte.upp) {
        hjälte.y -= 3;
        hjälte.rutRad = 3;
    }

    /* animera med sprite */
    if (hjälte.höger || hjälte.vänster || hjälte.ner || hjälte.upp) {
        var ruta = Math.floor(hjälte.rutIndex / 6);

        /* rita ut hjälte som går */
        ctx.save();
        ctx.translate(hjälte.x, hjälte.y);
        ctx.drawImage(hjälte.bild, ruta * 68, hjälte.rutRad * 72, 68, 72, 0, 0, 50, 50);
        ctx.restore();
    
        hjälte.rutIndex++;
        if (hjälte.rutIndex == hjälte.rutAntal * 6) {
            hjälte.rutIndex = 0;
        }
    }else{
        ctx.drawImage(hjälte.bild, 0, 0, 68, 72, hjälte.x, hjälte.y, 50, 50);
    }

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