let textBox = document.getElementById('expiration-calc');
let allInputs = document.getElementsByTagName('input')

textBox.innerText = (new Date().toLocaleDateString());

let discount = 0;

for(let child of allInputs) {
    if(child.getAttribute('name') === 'discount') {
        child.addEventListener('input', function() {
            discount = parseInt(child.value);
            let daysToAdd = 0;
            switch (discount) {
                case 5:
                    daysToAdd = 20;
                    break;
                case 10:
                    daysToAdd = 15;
                    break;
                case 15:
                    daysToAdd = 10;
            }

            let date = new Date();

            date.setDate(date.getDate() + daysToAdd);
            textBox.textContent = date.toLocaleDateString();
        })
    }
}


/*
discountInput.addEventListener('input', function() {
    console.log(discountInput.value)
})

 */