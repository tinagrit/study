// define global variables
let objExamAPI = null;
let subjcount = null;
let closestCount = null;
let timer = null;

// add zero to two-digit values
function addzero(n) {
    return (n < 10 ? '0' : '') + n;
}

// starting function
async function loadExamAPI() {
    let url = './exams.json';
    
    // fetch api
    try {
        objExamAPI = await (await fetch(url)).json();
    } catch(e) {
        console.log('Cannot load "exam.json" API, ' + e);
        document.querySelector('.welcome').style.fontSize = "30px";
        document.querySelector('.welcome').style.fontWeight = "bold";
    }
    
    // if active
    if (objExamAPI.info.active == true) {
        document.querySelector('.welcome').innerHTML += " - " + objExamAPI.info.name;
        document.querySelector('.countdown').style.display = 'flex';
        //get data and start timer
        FetchExam();
    } else {
        document.querySelector('.welcome').style.fontSize = "30px";
        document.querySelector('.welcome').style.fontWeight = "bold";
    }
}


// search json
function FetchExam() {
    let times = [];
    let nowaday = Date.now();
    

    //add all times of subj to array times
    subjcount = Object.keys(objExamAPI.subj).length;

    

    for (count=0;count<subjcount;count++) {
        times.push(objExamAPI.subj[count].start);
    }


    // nowaday = 1627631399999;

    //find closest value to nowaday
    closestCount = findClosest(times, nowaday);

    if (objExamAPI.subj[closestCount].friendlyname) {

        let subjfrn = objExamAPI.subj[closestCount].friendlyname;
        let scope = objExamAPI.subj[closestCount].scope;
        if (scope != 'all') {
            scope = ' (' + scope + ')';
        } else {
            scope = '';
        }

        if (nowaday > objExamAPI.subj[subjcount-1].start) {
            document.querySelector('.subjfrn').innerHTML = 'สอบเสร็จแล้ว!'
        } else {
            document.querySelector('.subjfrn').innerHTML = 'วิชา' + subjfrn + scope;
        }

    } else if (objExamAPI.subj[closestCount].group) {

        let groupChildCount = Object.keys(objExamAPI.subj[closestCount].group).length;
        for (count=0;count<groupChildCount;count++) {

            let tag = document.createElement('h1');
            tag.className = "subjfrn textCenter";

            let subjfrn = objExamAPI.subj[closestCount].group[count].friendlyname;
            let scope = objExamAPI.subj[closestCount].group[count].scope;
            if (scope != 'all') {
                scope = ' (' + scope + ')';
            } else {
                scope = '';
            }
            let innerHTML = document.createTextNode('วิชา' + subjfrn + scope);

            tag.appendChild(innerHTML);

            let parent = document.querySelector('.subjects');
            parent.appendChild(tag);

        }
    }

    if (nowaday > objExamAPI.subj[subjcount-1].start) {
        document.querySelector('.subjdate').innerHTML = '';
    } else {
        let subjdate = objExamAPI.subj[closestCount].date
        document.querySelector('.subjdate').innerHTML = subjdate;
    }
    
    timer = setInterval(runCount, 1000)
}

// start countdown
function runCount() {
    let nowaday = Date.now();
    let countTo = objExamAPI.subj[closestCount].start;
    countTo = Number(countTo);

    let currentGap = countTo - nowaday;

    const second = 1000;
    const minute = second * 60;
    const hour = minute * 60;
    const day = hour * 24;

    let dayGap = Math.floor(currentGap / day);
    let hourGap = Math.floor((currentGap % day) / hour);
    let minuteGap = Math.floor((currentGap % hour) / minute);
    let secondGap = Math.floor((currentGap % minute) / second);

    let dayText = document.querySelector('.time-day h1');
    let hourText = document.querySelector('.time-hour h1');
    let minuteText = document.querySelector('.time-min h1');
    let secondText = document.querySelector('.time-sec h1');

    document.querySelectorAll('.loader')[0].style.display = 'none';
    document.querySelectorAll('.loader')[1].style.display = 'none';
    document.querySelectorAll('.loader')[2].style.display = 'none';
    document.querySelectorAll('.loader')[3].style.display = 'none';

    dayText.style.display = 'block';
    hourText.style.display = 'block';
    minuteText.style.display = 'block';
    secondText.style.display = 'block';

    if (nowaday > objExamAPI.subj[subjcount-1].start) {
        dayText.innerHTML = '00';
        hourText.innerHTML = '00';
        minuteText.innerHTML = '00';
        secondText.innerHTML = '00';
    } else {
        dayText.innerHTML = addzero(dayGap);
        hourText.innerHTML = addzero(hourGap);
        minuteText.innerHTML = addzero(minuteGap);
        secondText.innerHTML = addzero(secondGap);
    }

    if (currentGap <= 0) {
        clearInterval(timer);
        FetchExam();
    }
}


// find closest value in array to target
function findClosest(arr, target) {
    for(count=0;count<arr.length;count++) {
        if (arr[count] > target) {
            return count;
        }
    }
}

// init
loadExamAPI();
