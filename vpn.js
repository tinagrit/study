function detectVPN() {
    var browserTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone
    return fetch(`https://ipapi.co/json`).then(function (response) {
        return response.json()
    }).then(function (data) {
        var ipTimezone = data.timezone
        return {
            browser: browserTimezone,
            ip: ipTimezone,
            usingVPN: ipTimezone != browserTimezone
        }
    })
}
detectVPN().then(function (detectionResult) {
    if(detectionResult.usingVPN) {
        window.location.href = "./403forbidden.php";
    }
})