function comma(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


fetch('https://covid19.th-stat.com/json/covid19v2/getTodayCases.json') 
    .then(response => response.json())
    .then(data => {
        document.querySelector('.outbreak').style.display = 'block';
        document.querySelector('.outbreak .covidnew').innerHTML = '+ ' + comma(data.NewConfirmed);
        document.querySelector('.outbreak .covidtotal').innerHTML = comma(data.Confirmed);
    })
    .catch(err => {
        console.log(err)
    })

document.querySelector('.userprofile').addEventListener('click',function() {
    window.location.href = "account.php";
})

document.querySelector('.download-button-blue').addEventListener('click', function() {
    console.log('clicked!')
    window.location.href = window.location.href + "&requests=1";
})