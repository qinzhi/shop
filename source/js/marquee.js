var Marquee_1_isMar = true;
var Marquee_1_1 = document.getElementById("Marquee_1_1");
var Marquee_1_2 = document.getElementById("Marquee_1_2");
var Marquee_1_3 = document.getElementById("Marquee_1_3");
if (Marquee_1_1.style.pixelWidth) {
    Marquee_1_isMar = Marquee_1_2.offsetWidth > Marquee_1_1.style.pixelWidth;
} else {
    var Marquee_1_width = parseInt(Marquee_1_1.style.width.replace('%', '').replace('px', ''));
    Marquee_1_isMar = Marquee_1_2.offsetWidth > Marquee_1_width;
}
if (Marquee_1_isMar) {
    Marquee_1_3.innerHTML = Marquee_1_2.innerHTML;
    function Marquee_1_function() {
        if (Marquee_1_3.offsetLeft - Marquee_1_1.scrollLeft <= 0)
            Marquee_1_1.scrollLeft -= Marquee_1_2.offsetWidth;
        else {
            Marquee_1_1.scrollLeft++
        }
    }
    var Marquee_1_myMar = setInterval(Marquee_1_function, 40);
    Marquee_1_1.onmouseover = function () { clearInterval(Marquee_1_myMar) }
    Marquee_1_1.onmouseout = function () { Marquee_1_myMar = setInterval(Marquee_1_function, 40) }
}