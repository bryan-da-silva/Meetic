window.onload = () => {
    let li = document.getElementsByTagName('li');
    let a = document.getElementsByTagName('a');
    var MailValide = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    let input = document.getElementsByTagName('input');
    input[2].addEventListener('click', valid);
    function valid (event) {
        if (!input[0].validity.valueMissing || !MailValide.test(input[0].value) == false) {
            input[0].style.backgroundColor = '';
            if (!input[1].validity.valueMissing) {
                input[1].style.backgroundColor = '';
                return true;
            } else {
                event.preventDefault();
                input[1].style.backgroundColor = 'red';
            }
        } else {
            event.preventDefault();
            input[0].style.backgroundColor = 'red';
        }
    }
    for (let i = 0; i < li.length; i++) {
        li[i].onmouseover = () => {
            a[i].style.color = "white";
        }
        li[i].onmouseout = () => {
            a[i].style.color = "black";
        }
    }
    li[0].onclick = () => {
        window.location.href = "connexion.php";
    }
    li[1].onclick = () => {
        window.location.href = "inscription.php";
    }
}