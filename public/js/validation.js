const form = document.getElementById('form');

form.addEventListener('submit', function(event) {


    const lastnameElement = document.getElementById('lastname');
    const firstnameElement = document.getElementById('firstname');
    const emailElement = document.getElementById('email');
    const phoneElement = document.getElementById('phone');
    const concertElement = document.getElementById('concert');

    const lastname = lastnameElement.value;
    const firstname = firstnameElement.value;
    const email = emailElement.value;
    const phone = phoneElement.value;
    const concert = concertElement.value;

    lastnameElement.style.borderColor = '#dbdbdb';
    firstnameElement.style.borderColor = '#dbdbdb';
    emailElement.style.borderColor = '#dbdbdb';
    phoneElement.style.borderColor = '#dbdbdb';

    email.trim();
    phone.trim()

    let errors = [];

    const red = '#F08080';

    if(lastname === '') {
        errors.push('Bitte geben Sie einen Nachnamen an');
        lastnameElement.style.borderColor = red;
    }

    if(firstname === '') {
        errors.push('Bitte geben Sie einen Vornamen an');
        firstnameElement.style.borderColor = red;
    }


    if (email=== '') {
        errors.push('Bitte geben Sie eine E-mail an');
        emailElement.style.borderColor = red;
    }else if (!email.match('/(.+)@(.+){2,}\\.(.+){2,}')) {
        errors.push('Bitte geben Sie eine Valide Email ein.');
        emailElement.style.borderColor = red;
    }

    if(!phone.match('/^(?:(?:|0{1,2}|\\+{0,2})41(?:|\\(0\\))|0)([1-9]\\d)(\\d{3})(\\d{2})(\\d{2})$/')) {
        errors.push('Bitte geben Sie eine Valide Telefonnummer ein.');
        phoneElement.style.borderColor = red;
    }


    if(concert.value === '') {
        errors.push('Bitte geben Sie ein Konzert an.');
    }

    if (errors.length > 0) {

        event.preventDefault();

        const errorList = document.getElementById('error-list');

        errorList.innerHTML = "";

        for(let error of errors) {
            const errorMessage = document.createElement("li");

            errorMessage.textContent = error;
            errorList.append(errorMessage);
        }
    }
})