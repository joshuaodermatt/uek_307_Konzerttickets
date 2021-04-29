const form = document.getElementById('form');

form.addEventListener('submit', function(event) {



    const lastname = document.getElementById('lastname').value;
    const firstname = document.getElementById('firstname').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const concert = document.getElementById('concert').value;

    lastname.style.borderColor = '#dbdbdb';
    firstname.style.borderColor = '#dbdbdb';
    email.style.borderColor = '#dbdbdb';
    phone.style.borderColor = '#dbdbdb';

    email.trim();
    phone.trim()

    let errors = [];

    const red = '#F08080';

    if(lastname === '') {
        errors.push('Bitte geben Sie einen Nachnamen an');
        lastname.style.borderColor = red;
    }

    if(firstname === '') {
        errors.push('Bitte geben Sie einen Vornamen an');
        firstname.style.borderColor = red;
    }


    if (email=== '') {
        errors.push('Bitte geben Sie eine E-mail an');
        email.style.borderColor = red;
    }else if (!email.match('/(.+)@(.+){2,}\\.(.+){2,}')) {
        errors.push('Bitte geben Sie eine Valide Email ein.');
        email.style.borderColor = red;
    }

    if(!phone.value.match('/^(?:(?:|0{1,2}|\\+{0,2})41(?:|\\(0\\))|0)([1-9]\\d)(\\d{3})(\\d{2})(\\d{2})$/')) {
        errors.push('Bitte geben Sie eine Valide Telefonnummer ein.');
        phone.style.borderColor = red;
    }


    if(concert.value === '') {
        errors.push('Bitte geben Sie ein Konzert an.');
    }

    if (errors.length > 0) {
        const errorList = document.getElementById('error-list');

        event.preventDefault();

        console.log('prevented default')

        errorList.innerHTML = "";

        for(let error of errors) {
            const errorMessage = document.createElement("li");

            errorMessage.textContent = error;
            errorList.append(errorMessage);
        }
    }
})