/* element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* ställ in storlek på canvas */
eCanvas.width = 320;
eCanvas.height = 480;

/* globala variabler */
var ctx = eCanvas.getContext("2d");
var frames = 0;

class Bakgrund {
    constructor(){
        this.sY = 0;
        this.sX = 0;
        this.w = 275;
        this.h = 226;
        this.x = 0;
        this.y = eCanvas.height - 226;
        this.bild = new Image();
        this.bild.src = "./bilder/sprite.png";
    }
    draw() {
        ctx.drawImage(sprite, this.sX, this.sY, this.w, this.h, this.x, this.y, this.w, this.h);
    }

}
var bakgrund = new Bakgrund();

class Fågel {
    constructor(){
        this.x = 50;
        this.y = 150;
        this.w = 34;
        this.h = 26;
        this.animation = [
            {sX: 276, sY: 112},
            {sX: 276, sY: 239},
            {sX: 276, sY: 164},
            {sX: 276, sY: 239}
        ];
        this.frame = 0;
    }
    draw(){
        var Fågel = this.animation[this.frame];
    }
}
var fågel = new Fågel();

function draw() {
    /* rita bakgrund */
    ctx.fillStyle = "#70c5ce";
    ctx.fillRect(0, 0, eCanvas.width, eCanvas.height);
    bakgrund.draw();
    


    
}

function loop() {
    update();
    draw();
    frames++;

    requestAnimationFrame(loop);
}
loop();