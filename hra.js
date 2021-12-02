let textArea = document.querySelector(".textArea");
let rewriteText = document.querySelector(".rewriteText");
let autor = document.querySelector(".autor");
let casovacElement = document.querySelector(".timer");
const DEFAULT_TIME = 60;
let casovac = null;


const hlaskyPolitikov = [
    ["Žiaden človek nedokáže dať toľko lásky človeku, ako dokáže len človek človeku.", "Kpt.JUDr.Danko"],
    ["Dočkaj času jak hus klasu. Prepáčte, že tykám.", "Mgr.Igor Matovič"],
    ["Môžem vám aj za-re-po-vať.", "JUDr. Štefan Harabin"],
    ["Preto som sa rozhodol tu, z tejto maštale povedať pravdu slovenskej verejnosti!", "Ing. Miroslav Jureňa"],
    ["Z dlhodobého hľadiska sme všetci mŕtvi.", "Ing. Richard Sulík"],
    ["My pôjdeme do tankoch a pôjdeme a zrovnáme Budapešť!", "Ing. Ján Slota"],
    ["Prosím vás neotravujte tu sme pri žatve.", "Doc JUDr Robert Fico, CSc"],
    ["Tá choroba existuje, ale je vymyslená a je to ďalší druh chrípky.", "Ing. Mgr Marian Kotleba"]
];

let aktualnaHlaska = dajHlasku();
rewriteText.innerText = aktualnaHlaska[0];
autor.innerText = aktualnaHlaska[1];
let aktualnyText = "";

let uplynulyCas = 0;
let zostavajuciCas = 60;


textArea.addEventListener('click', spustiHru());
textArea.addEventListener('input', function(e) {
    aktualnyText = textArea.innerText;
    charsAktualnyText = aktualnyText.split('');

});

function dajHlasku() {
    let dlzka = hlaskyPolitikov.length;
    let rndIndex = Math.floor(Math.random() * dlzka);
    return hlaskyPolitikov[rndIndex];
}

function spustiHru() {
    oznacZnaky();

    casovac = setInterval(updateTime, 1000);
}

function oznacZnaky() {
    rewriteText.innerText = "";
    aktualnaHlaska[0].split('').forEach(znak => {
        let span = document.createElement('span');
        span.innerText = znak;
        rewriteText.appendChild(span);
    });
}

function updateTime() {
    if (zostavajuciCas > 0) {
        zostavajuciCas--;
        uplynulyCas++;
        casovacElement.innerText = zostavajuciCas;
    } else {
        ukonciHru();
    }
}

function resetTime() {

}

function ukonciHru() {

}