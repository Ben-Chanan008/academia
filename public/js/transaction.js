const transaction = $select('#transaction');
const cards = $all('.cards input');
const nextBtn = $select('[data-next]');

cards.forEach(card =>{
    let _token = document.querySelector('meta[token]').attributes.token.value,
        selectedCard,
        formData = new FormData();

        formData.append('_token', _token);

    card.addEventListener('click', (e) => {
        selectedCard = e.currentTarget.value;
        formData.append('card', selectedCard);

        fetch('http://localhost:8000/transaction/card', {
            method: 'POST',
            body: formData
        }).then(res => res.json()).then(data => {
            let incomeForm = $select('#income-form');

            incomeForm.addEventListener('submit', (e) => {
                e.preventDefault();

                let incomeData = new FormData(),
                    incomeValue = $select('#income').value;

                incomeData.append('_token', _token)
                incomeData.append('cvc', data.cvc)
                incomeData.append('income', incomeValue)

                console.log(incomeData);
                fetch('http://localhost:8000/income/add', {
                    method: 'POST',
                    body: incomeData
                }).then(res => res.json()).then(data => console.log(data));
            });


        });
    });
});

nextBtn.addEventListener('click', (e) => {
    let steps = $all('#transaction .step');
    steps.forEach((step, idx) => step.classList.toggle('active'))
});

// clickBtn.addEventListener('click', (e) => {
// });
//
//
//
