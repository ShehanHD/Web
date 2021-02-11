let year = '2022';
let endDate = '-01-01 00:00';

let countdown = setInterval(() => {
    const toCount = new Date(year + endDate);
    const currentDate = new Date();

    let distance = toCount - currentDate;

    if (distance < 0) {
        year++;
        document.getElementById("congrats").style.display = "flex";
        setTimeout(() => {
            document.getElementById("congrats").style.display = "none";
        }, 10000);
    }
    else {
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").innerHTML = days < 10 ? '0' + days : days;
        document.getElementById("hours").innerHTML = hours < 10 ? '0' + hours : hours;
        document.getElementById("minutes").innerHTML = minutes < 10 ? '0' + minutes : minutes;
        document.getElementById("seconds").innerHTML = seconds < 10 ? '0' + seconds : seconds;
    }
}, 1000)
