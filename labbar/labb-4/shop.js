window.onload = start;

function start() {
    /* elementen som vi jobbar med */
    const eleTabel = document.querySelector("table");

    /* när man klickar i tabelen */
    eleTabel.addEventListener("click", klick);

    function klick(e) {
        console.log(e.target.nodeName);
        if (e.target.nodeName === "BUTTON") {
            summera(e.target);
        }
    }

    function summera(knapp) {
        const eleRad = knapp.parentNode.parentNode;
        const eleAntal = eleRad.querySelector("#antal");
        const elePris = eleRad.querySelector("#pris");
        const eleSumma = eleRad.querySelector("#summa");

        var antal = parseInt(eleAntal.textContent);
        var pris = parseInt(elePris.textContent);
        var summa = parseInt(eleSumma.textContent);

        if (knapp.id === "plus") {
            antal++;
        } else {
            if (antal > 0) {
                antal--;
            }
           
        }
        eleAntal.textContent = antal;
        eleSumma.textContent = (antal * pris)+":-";

        /* summera hela varukorgen */
        totalVaror();
    }
    function totalVaror() {
        const eleTotal = document.querySelector("#total");
        const eleSummor = document.querySelectorAll("#summa");
        var total = 0;

        /* Addera rad för rad */
        for (const eleSumma of eleSummor) {
            total = total + parseInt(eleSumma.textContent);
        }
        /* skriv tillbaka totalen */
        eleTotal.textContent = total + ":-";
    }

}