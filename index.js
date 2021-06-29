function comma(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


// if (document.querySelector('.outbreak')) {
//     fetch('https://covid19.th-stat.com/json/covid19v2/getTodayCases.json')
//     .then(response => response.json())
//     .then(data => {
//         document.querySelector('.outbreak').style.display = 'block';
//         document.querySelector('.outbreak .covidnew').innerHTML = '+ ' + comma(data.NewConfirmed);
//         document.querySelector('.outbreak .covidtotal').innerHTML = comma(data.Confirmed);
//     })
//     .catch(err => {
//         console.log(err)
//     })
// }



if (document.querySelector('.userprofile')) {
    document.querySelector('.userprofile').addEventListener('click', function () {
        window.location.href = "account.php";
    })
}


if (document.querySelector('.download-button-blue')) {
    document.querySelector('.download-button-blue').addEventListener('click', function () {
        window.location.href = window.location.href + "&requests=1";
    })
}


if (document.querySelector('.download-button-gray')) {
    document.querySelector('.download-button-gray').addEventListener('click', function () {
        swal('คำขออยู่ในคิว เราจะติดสินใจในไม่ช้า')
    })
}


if (document.querySelector('.download-button-green')) {
    document.querySelector('.download-button-green').addEventListener('click', function () {
        window.location.href = window.location.href + "&download";
    })
}

if (document.querySelector('.download-button-red')) {
    document.querySelector('.download-button-red').addEventListener('click', function () {
        swal({
            icon: "error",
            text: "คำขอถูกปฏิเสธ"
            
        })
    })
    
    document.querySelector('.sendAgain').addEventListener('click', function () {
        window.location.href = window.location.href + "&requests=1";
    })
}

if (document.querySelector('.logoutbutton')) {
    document.querySelector('.logoutbutton').addEventListener('click', function() {
        swal({
            icon: 'warning',
            title: 'ออกจากระบบ',
            text: 'สามารถใช้ชื่อเดิมเพื่อเข้าสู่ระบบในครั้งถัดไป',
            dangerMode: true,
            buttons: {
                cancel: {
                    text: "ยกเลิก",
                    value: 'cancel',
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "ออกจากระบบ",
                    value: 'confirm',
                    visible: true,
                    className: "ComfirmLogOut",
                    closeModal: true
                  }
            }
            
          }) .then((value) => {
              switch(value) {
                  case 'confirm':
                    location.replace('account.php?logout=true')
                    break;
              }
          })
    })
}


if (document.querySelector('.deletebutton')) {
    document.querySelector('.deletebutton').addEventListener('click', function() {
        swal({
            icon: 'warning',
            title: 'ลบบัญชี',
            text: 'ระบบจะลบข้อมูลทั้งหมดที่เกี่ยวข้องกับบัญชี การดำเนินการนี้ไม่สามารถกู้คืนได้',
            dangerMode: true,
            buttons: {
                cancel: {
                    text: "ยกเลิก",
                    value: 'cancel',
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "ลบบัญชี",
                    value: 'confirm',
                    visible: true,
                    className: "ComfirmDel",
                    closeModal: true
                  }
            }
            
          }) .then((value) => {
              switch(value) {
                  case 'confirm':
                    swal({
                        icon: 'warning',
                        title: 'แน่ใจไหม?',
                        text: 'ข้อมูลจะถูกลบอย่างถาวรจากฐานข้อมูล รวมถึงคำขอเข้าถึงด้วย',
                        dangerMode: true,
                        buttons: {
                            cancel: {
                                text: "ยกเลิก",
                                value: 'cancel',
                                visible: true,
                                className: "",
                                closeModal: true,
                              },
                              confirm: {
                                text: "ลบบัญชี",
                                value: 'confirmdel',
                                visible: true,
                                className: "ComfirmDel",
                                closeModal: true
                              }
                        }
                        
                      }) .then((value) => {
                          switch(value) {
                              case 'confirmdel':
                                location.href = 'crud/action.php?deleteuserclient=1'
                                break;
                          }
                      })
                    break;
              }
          })
    })
}

if(document.querySelector('.tabs-li')) {

    document.querySelectorAll('.tabs-li')[0].addEventListener('click', () => {
        location.replace('index.php');
    })

    document.querySelectorAll('.tabs-li')[1].addEventListener('click', () => {
        location.replace('403forbidden.php');
    })

    document.querySelectorAll('.tabs-li')[2].addEventListener('click', () => {
        location.replace('account.php');
    })
}

if(document.querySelector('.tabs-li-crud')) {

    document.querySelectorAll('.tabs-li-crud')[0].addEventListener('click', () => {
        location.replace('../index.php');
    })

    document.querySelectorAll('.tabs-li-crud')[1].addEventListener('click', () => {
        location.replace('../403forbidden.php');
    })

    document.querySelectorAll('.tabs-li-crud')[2].addEventListener('click', () => {
        location.replace('../account.php');
    })
}