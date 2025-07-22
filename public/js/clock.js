function updateClock(clockId, dateId) {
    const today = new Date();
    let hr = today.getHours();
    let min = today.getMinutes();
    let sec = today.getSeconds();
    let ap = hr < 12 ? "AM" : "PM";

    hr = hr % 12 || 12;
    hr = hr < 10 ? "0" + hr : hr;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    const clockEl = document.getElementById(clockId);
    const dateEl = document.getElementById(dateId);

    if (clockEl && dateEl) {
        clockEl.innerHTML = `${hr}:${min}:${sec} <span class="ampm">${ap}</span>`;
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const months = ['January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'];
        const date = `${days[today.getDay()]}, ${today.getDate()} ${months[today.getMonth()]} ${today.getFullYear()}`;
        dateEl.innerHTML = date;
    }
}

setInterval(() => updateClock('clock2', 'date2'), 1000);
document.addEventListener("DOMContentLoaded", () => updateClock('clock2', 'date2'));
