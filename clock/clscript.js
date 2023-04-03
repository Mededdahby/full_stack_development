const second = document.querySelector("#seconds");
const minute = document.querySelector("#minutes");
const hour = document.querySelector("#hours");
function Upadatclock() {
    let d = new Date();
    let s = d.getSeconds();
    let ns = s * 360 / 60;
    let m = d.getMinutes();
    let nm = m * 360 / 60;
    let h = d.getHours();
    let nh = h * 360 / 6;
    second.setAttribute("transform", `rotate(${ns})`);
    minute.setAttribute("transform", `rotate(${nm})`);
    hour.setAttribute("transform", `rotate(${nh})`);
}
setInterval(Upadatclock, 1000);
