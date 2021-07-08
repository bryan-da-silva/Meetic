window.onload = () => {
    let li = document.getElementsByTagName('li');
    let a = document.getElementsByTagName('a');
    let input = document.getElementsByTagName('input');
    let button = document.getElementsByTagName('button');
    var MailValide = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var NameValide = /^[a-zA-Zéèîïç -]{3,32}$/;
    input[9].addEventListener('click', valid);
    li[0].onmouseover = () => {
        a[0].style.color = "white";
    }
    li[0].onmouseout = () => {
        a[0].style.color = "black";
    }
    li[0].onclick = () => {
        window.location.href = "compte.php";
    }
    li[1].onmouseover = () => {
        a[1].style.color = "white";
    }
    li[1].onmouseout = () => {
        a[1].style.color = "black";
    }
    li[1].onclick = () => {
        window.location.href = "recherche.php";
    }
    button[0].onclick = () => {
        for(let i = 0; i < input.length; i++) {
            input[i].disabled = false;
        }
        input[9].style.backgroundColor = "#4CAF50";
        input[9].style.cursor = "pointer";
    }

    function valid (event) {
        if (!input[2].validity.valueMissing && NameValide.test(input[2].value) == true) {
            input[2].style.backgroundColor = '';
            if (!input[3].validity.valueMissing && NameValide.test(input[3].value) == true) {
                input[3].style.backgroundColor = '';
                if (!input[4].validity.valueMissing) {
                    input[4].style.backgroundColor = '';
                    if (!input[5].validity.valueMissing && MailValide.test(input[5].value) == true) {
                        input[5].style.backgroundColor = '';
                        if (!input[6].validity.valueMissing) {
                            input[6].style.backgroundColor = '';
                            if (!input[7].validity.valueMissing) {
                                input[7].style.backgroundColor = '';
                                if (!input[8].validity.valueMissing && input[7].value === input[8].value) {
                                    input[8].style.backgroundColor = '';
                                } else {
                                    event.preventDefault();
                                    input[8].style.backgroundColor = 'red';
                                }
                            } else {
                                event.preventDefault();
                                input[7].style.backgroundColor = 'red';
                            }
                        } else {
                            event.preventDefault();
                            input[6].style.backgroundColor = 'red';
                        }
                    } else {
                        event.preventDefault();
                        input[5].style.backgroundColor = 'red';
                    }
                } else {
                    event.preventDefault();
                    input[4].style.backgroundColor = 'red';
                }
            } else {
                event.preventDefault();
                input[3].style.backgroundColor = 'red';
            }
        } else {
            event.preventDefault();
            input[2].style.backgroundColor = 'red';
        }
    }
}