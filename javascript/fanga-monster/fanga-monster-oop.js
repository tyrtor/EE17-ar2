/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;

/* Objekten i spelet */
class Spel {
    constructor(){
        this.tid = 60;
        this.poäng = 0;
        this.isGameOver = false;
        this.bild = new Image();
        this.bild.src = "./bilder/background.png";
    }
    rita() {
        ctx.drawImage(spel.bild, 0, 0);
    }
}

var spel = new Spel;

class Hjälte {
    constructor() {
        this.x = eCanvas.width / 2 ;
        this.y = eCanvas.height / 2;
        this.a = 5;
        this.vänster = false;
        this.höger = false;
        this.upp = false;
        this.ner = false;
        this.bild = new Image();
        this.rutIndex = 0;
        this.rutAntal = 4;
        this.rutRad = 0;
        this.bild.src = "./bilder/pokemon-bald-sprite.png";
    }
    rita() {
        /* flytta åt det håll vi tryckt på */
        if (this.höger) {
            this.x += 3;
            this.rutRad = 2;
        }else
        if (this.vänster) {
            this.x -= 3;
            this.rutRad = 1;
        }else
        if (this.ner) {
            this.y += 3;
            this.rutRad = 0;
        }else
        if (this.upp) {
            this.y -= 3;
            this.rutRad = 3;
        }
    
        /* animera med sprite */
        if (this.höger || this.vänster || this.ner || this.upp) {
            var ruta = Math.floor(this.rutIndex / 6);
    
            /* rita ut this som går */
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.drawImage(this.bild, ruta * 68, this.rutRad * 72, 68, 72, 0, 0, 50, 50);
            ctx.restore();
        
            this.rutIndex++;
            if (this.rutIndex == this.rutAntal * 6) {
                this.rutIndex = 0;
            }
        }else{
            ctx.drawImage(this.bild, 0, 0, 68, 72, this.x, this.y, 50, 50);
        }
    }
}
var hjälte = new Hjälte();

class Monster {
    constructor() {
        this.x = 0;
        this.y = 0;
        this.bild = new Image();
        this.bild.src = "./bilder/monster.png";
    }
    rita() {
        ctx.drawImage(this.bild, this.x, this.y);
    }
    /* Återställ spelet */
    spawn() {
    /* Spawna monstret slumpmässigt */
    this.x = 32 + Math.random() * (eCanvas.width - 100);
    this.y = 32 + Math.random() * (eCanvas.height - 100);
}
}
var monster = new Monster();

/* Ladda in bilderna */

/* Canvas inställningar */


/* Kör igång spelet */
monster.spawn();
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



/* Kollar om hjälten träffar monstret */
function kollaKollision() {
    /* träffar hjälten monstret */
    if (hjälte.x <= (monster.x + 32) && monster.x <= (hjälte.x + 32) && 
        hjälte.y <= (monster.y + 32) && monster.y <= (hjälte.y + 32)) {
        monster.spawn();
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
    spel.rita();
    hjälte.rita();
    monster.rita();
    kollaKollision();

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}