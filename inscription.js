window.onload = () => {
    let li = document.getElementsByTagName('li');
    let a = document.getElementsByTagName('a');
    var MailValide = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var NameValide = /^[a-zA-Zéèîïç -]{3,32}$/;
    let input = document.getElementsByTagName('input');
    let select = document.getElementsByTagName('select');
    input[8].addEventListener('click', valid);
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
    
    function valid (event) {
        if (!input[0].validity.valueMissing || !NameValide.test(input[0].value) == false) {
            input[0].style.backgroundColor = '';
            if (!input[1].validity.valueMissing || !NameValide.test(input[1].value) == false) {
                input[1].style.backgroundColor = '';
                if (!input[2].value == false) {
                    input[2].style.backgroundColor = '';
                    if (select[0].value === "Femme" || select[0].value === "Homme" || select[0].value === "Autre") {
                        select[0].style.backgroundColor = '';
                        if (!input[3].validity.valueMissing) {
                            input[3].style.backgroundColor = '';
                            if (!input[4].validity.valueMissing || !MailValide.test(input[4].value) == false) {
                                input[4].style.backgroundColor = '';
                                if ((!input[5].validity.valueMissing || !MailValide.test(input[5].value) == false) && input[4].value === input[5].value) {
                                    input[5].style.backgroundColor = '';
                                    if (!input[6].validity.valueMissing) {
                                        input[6].style.backgroundColor = '';
                                        if (!input[7].validity.valueMissing && input[6].value === input[7].value) {
                                            input[7].style.backgroundColor = '';
                                            if (select[1].value == "CodeLyoko") {
                                                select[1].style.backgroundColor = '';
                                                return true;
                                            } else {
                                                event.preventDefault();
                                                select[1].style.backgroundColor = 'red';
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
                        select[0].style.backgroundColor = 'red';
                    }
                } else {
                    event.preventDefault();
                    input[2].style.backgroundColor = 'red';
                }
            } else {
                event.preventDefault();
                input[1].style.backgroundColor = 'red';
            }
        } else {
            event.preventDefault();
            input[0].style.backgroundColor = 'red';
        }
    }

}