let pictureSrc = 'images/' + Math.floor(Math.random() * 10) + '.jpg'
document.querySelector('.banner').src = pictureSrc

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHKLMNOPRSTUWXYZ123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}

// document.querySelector('.idDesc').innerHTML = '';
// document.querySelector('.idDesc2').innerHTML = '';
// document.querySelector('.idDesc3').innerHTML = 'ระบบจะสร้างไอดีให้ชื่อผู้ใช้ของคุณเพื่อยืนยันตัวตน';
// document.querySelector('.starOnType').style.display = 'none';
// document.querySelector('.submitButton').style.display = 'none';

// let starredUser;
// function starred() {
//     document.querySelector('.starOnType').style.display = 'inline';
//     starredUser = true;
// }
document.querySelector('.submitButton').style.display = 'none';

document.querySelector('.usernameBox').addEventListener('keyup', function () {
    if (this.value != '') {
        document.querySelector('.submitButton').style.display = 'inline';
        // starredUser = false;
        // document.querySelector('.starOnType').style.display = 'none';
        // document.querySelector('.usernameLive').innerHTML = ' ' + this.value + ' ';
        // document.querySelector('.idDesc').innerHTML = 'ไอดีใหม่ของ';
        // document.querySelector('.idDesc2').innerHTML = 'คือ';
        // document.querySelector('.idDesc3').innerHTML = ' (ไม่ต้องจำสิ่งนี้)'

        // switch (this.value) {
        //     case 'gnnill_':
        //         userId = 'NARAK';
        //         starred();
        //         break;
        //     case 'tinagrit':
        //         userId = 'MULLL';
        //         starred();
        //         break;
        //     case 'nnopps':
        //         userId = 'NOPPP';
        //         starred();
        //         break;
        //     case 'm_tatchapol':
        //         userId = 'MMMMM';
        //         starred();
        //         break;
        //     case 'tatachanon':
        //         userId = 'TATAT';
        //         starred();
        //         break;
        //     case 'ppondlb':
        //         userId = 'PPOND';
        //         starred();
        //         break;
        //     case 'boss_act_':
        //         userId = 'BOSS1';
        //         starred();
        //         break;
        //     case 'lilbozz_1':
        //         userId = 'BOSS2';
        //         starred();
        //         break;
        //     case 'bee0r':
        //         userId = 'BEEER';
        //         starred();
        //         break;
        //     case '_ktpop':
        //         userId = 'POPPP';
        //         starred();
        //         break;
        //     case 'jjaonaii_mbkv_':
        //         userId = 'JAONA';
        //         starred();
        //         break;
        //     case '_mmudmokk_':
        //         userId = 'MUDMK';
        //         starred();
        //         break;
        //     case 'nongyiimmmm':
        //         userId = 'EARNN';
        //         starred();
        //         break;
        //     case 'instagram':
        //         userId = 'INSTA';
        //         starred();
        //         break;
        //     default:
        //         userId = makeid(5);
        //         break;
        // }

        // document.querySelector('.idNum').innerHTML = userId;
    } else {
        document.querySelector('.submitButton').style.display = 'none';
        // starredUser = false;
        // document.querySelector('.starOnType').style.display = 'none';
        // document.querySelector('.idDesc').innerHTML = '';
        // document.querySelector('.idDesc2').innerHTML = '';
        // document.querySelector('.idDesc3').innerHTML = 'ระบบจะสร้างไอดีให้ชื่อผู้ใช้ของคุณเพื่อยืนยันตัวตน'
        // document.querySelector('.usernameLive').innerHTML = '';
        // document.querySelector('.idNum').innerHTML = '';
    }

})

// $('.answer').on('keyup', function () {

// })

// window.post = function(url, data) {
//     return fetch(url, {method: "POST", body: JSON.stringify(data)});
//   }

