window.onload = () => {
    let li = document.getElementsByTagName('li');
    let a = document.getElementsByTagName('a');
    let input = document.getElementsByTagName('input');
    let select = document.getElementsByTagName('select');
    input[1].addEventListener('click', valid);
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

    function valid (event) {
        if (select[0].value === "Femme" || select[0].value === "Homme" || select[0].value === "Autre") {
            select[0].style.backgroundColor = '';
            if (select[1].value === "18/25" || select[1].value === "25/35" || select[1].value === "35/45") {
                select[1].style.backgroundColor = '';
                if (!input[0].validity.valueMissing) {
                    input[0].style.backgroundColor = '';
                    if (select[2].value === "CodeLyoko") {
                        select[2].style.backgroundColor = '';  
                    } else {
                        event.preventDefault();
                        select[2].style.backgroundColor = 'red';
                    }
                } else {
                    event.preventDefault();
                    input[0].style.backgroundColor = 'red';
                }
            } else {
                event.preventDefault();
                select[1].style.backgroundColor = 'red';
            }
        } else {
            event.preventDefault();
            select[0].style.backgroundColor = 'red';
        }
    }
}