const time = document.getElementById('time');
    // greeting = document.getElementById('greeting'),
    // name = document.getElementById('name'),
    // focus = document.getElementById('focus');

// showTime

const showTime = () => {
    let today = new Date(),
        hour = today.getHours(),
        min = today.getMinutes(),
        sec = today.getSeconds();

    // AM or PM
    const amPM = hour >= 12 ? 'PM' : 'AM';

    // 12 hour format
    hour = hour % 12 || 12;

    // output the time
    time.innerHTML = `${hour}:${addZero(min)}:${addZero(sec)} <span>${amPM}</span>`;

    setTimeout(() => {
        showTime();
    }, 1000);
}

// Add Zero
const addZero = (n) => {
    return (parseInt(n,10) < 10 ? '0' : '') + n
}


showTime();