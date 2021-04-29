const form = document.getElementById('form');

form.addEventListener('submit', function(event) {



    const lastnameElement = document.getElementById('lastname');
    const firstnameElement = document.getElementById('firstname');
    const emailElement = document.getElementById('email');
    const phoneElement = document.getElementById('phone');
    const concertElement = document.getElementById('concert');

    const lastname = lastnameElement.value;
    const firstname = firstnameElement.value;
    let email = emailElement.value;
    let phone = phoneElement.value;
    const concert = concertElement.value;

    email = email.trim();
    phone = phone.trim();

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

    console.log(email);

    console.log(email.match('/\\S+@\\S+\\.\\S+/'));

    if (email=== '') {
        errors.push('Bitte geben Sie eine E-mail an');
        emailElement.style.borderColor = red;
    }else if (!email.match('/\\S+@\\S+\\.\\S+/')) {
        errors.push('Bitte geben Sie eine Valide Email ein.');
        emailElement.style.borderColor = red;
    }

    if(!phone.match('/^[\\+]?[(]?[0-9]{3}[)]?[-\\s\\.]?[0-9]{3}[-\\s\\.]?[0-9]{4,6}$/im')) {
        errors.push('Bitte geben Sie eine Valide Telefonnummer ein.');
        phoneElement.style.borderColor = red;
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