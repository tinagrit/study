document.querySelector('.submitButton').style.display = 'none';

document.querySelector('.usernameBox').addEventListener('keyup', function () {
    if (this.value != '') {
        document.querySelector('.submitButton').style.display = 'inline';
    } else {
        document.querySelector('.submitButton').style.display = 'none';
    }

})
