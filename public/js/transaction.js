const transaction = $select('#transaction');
const cards = $all('.cards input');
const loader = $select('.loader');
const msg = $select('.msg');

msg.style.display = 'none';

cards.forEach(card =>{
    let _token = document.querySelector('meta[token]').attributes.token.value,
        selectedCard,
        formData = new FormData();

        formData.append('_token', _token);

    card.addEventListener('click', (e) => {
        selectedCard = e.currentTarget.value;
        formData.append('card', selectedCard);

        loader.classList.remove('d-none');
        loader.classList.add('d-block');

        setTimeout(() => {
            loader.classList.remove('d-block');
            loader.classList.add('d-none');

            let steps = $all('#transaction .step');
            steps.forEach((step, idx) => step.classList.toggle('active'));

            fetch('http://localhost:8000/transaction/card', {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                let incomeForm = $select('#income-form');

                localStorage.setItem('cvc', data.cvc);
                incomeForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    let incomeData = new FormData(),
                        incomeValue = $select('#income').value;

                    incomeData.append('_token', _token)
                    incomeData.append('cvc', data.cvc)
                    incomeData.append('income', incomeValue)

                    fetch('http://localhost:8000/income/add', {
                        method: 'POST',
                        body: incomeData
                    }).then(res => res.json()).then(data => {
                        msg.style.display = 'block';
                        msg.innerHTML = `<p class="text-success">${data.message}</p>`;

                        setTimeout(() => {
                            // window.history.pushState('home', 'home', `/${data.route}`)
                            location.href = `${data.route}?card=${localStorage.getItem('cvc')}`;
                        }, 1000)
                    });
                });
            });
        }, 1500);

    });
});

// nextBtn.addEventListener('click', (e) => {
//     let steps = $all('#transaction .step');
//     steps.forEach((step, idx) => step.classList.toggle('active'))
// });

// clickBtn.addEventListener('click', (e) => {
// });
//
//
//
