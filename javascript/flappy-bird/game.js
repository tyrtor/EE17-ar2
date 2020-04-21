/* element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* ställ in storlek på canvas */
eCanvas.width = 320;
eCanvas.height = 480;

/* globala variabler */
var ctx = eCanvas.getContext("2d");
var frames = 0;

/* ladda in bilderna */
bild = new Image();
bild.src = "./bilder/sprite.png";

/* game state */
const state = {
    current: 0,
    getRedy: 0,
    game: 1,
    over: 2

}

/* kontrollera spelet */
eCanvas.addEventListener("click", function (evt) {
    switch (state.current) {
        case state.getRedy:
            state.current = state.game;
            break;
        case state.game:
            bird.flap();
            break;
        case state.over:
            state.current = state.getRedy;
            break;
    }
});

/* objekten */
const bg = {
    sY: 0,
    sX: 0,
    w: 275,
    h: 226,
    x: 0,
    y: eCanvas.height - 226,
    
    draw: function () {
        ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x, this.y, this.w, this.h);
        ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x + this.w, this.y, this.w, this.h);
    }
}

const fg = {
    sX: 276,
    sY: 0,
    w: 224,
    h: 112, 
    x: 0,
    y: eCanvas.height - 112,

    draw: function () {
        ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x, this.y, this.w, this.h);
        ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x + this.w, this.y, this.w, this.h);
    }
}

const bird = {
    animation: [
        {sX: 276, sY: 112},
        {sX: 276, sY: 239},
        {sX: 276, sY: 164},
        {sX: 276, sY: 239}
    ],
    x: 50,
    y: 150,
    w: 34,
    h: 26,

    frame: 0,

    draw: function() {
        var bird = this.animation[this.frame];

        ctx.drawImage(bild, bird.sX, bird.sY, this.w, this.h, this.x - this.w/2, this.y - this.h/2, this.w, this.h);
    }, 
    
    flap: function () {
        
    },

    update: function () {
        /* if the game state is get ready state, the bird must flap slowly */
        this.period = state.current == state.getRedy ? 10 : 5;
        /* we increment the frame by 1, each period */
        this.frame += frames%this.period == 0 ? 1 : 0;
        /* frame goes from 0 to 4, then again to 0 */
        this.frame = this.frame%this.animation.length;
    }
}

const getRedy = {
    sX: 0,
    sY: 228,
    w: 173,
    h: 152,
    x: eCanvas.width/2 - 173/2,
    y: 80,

    draw: function () {
        if (state.current == state.getRedy) {
            ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x, this.y, this.w, this.h);
        }
    }
}

const gameOver = {
    sX: 175,
    sY: 228,
    w: 225,
    h: 202,
    x: eCanvas.width/2 - 225/2,
    y: 90,

    draw: function () {
        if (state.current == state.over) {
            ctx.drawImage(bild, this.sX, this.sY, this.w, this.h, this.x, this.y, this.w, this.h);
        }
    }
}


function draw() {
    /* rita bakgrund */
    ctx.fillStyle = "#70c5ce";
    ctx.fillRect(0, 0, eCanvas.width, eCanvas.height);

    bg.draw();
    fg.draw();
    bird.draw();
    getRedy.draw();
    gameOver.draw();
    


    
}

function loop() {
    draw();
    frames++;

    requestAnimationFrame(loop);
}
loop();