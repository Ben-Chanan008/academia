const loginForm = $select('#login-form');
const registerForm = $select('#register-form');
const cardForm = $select('#card-form');
const msgDisplay = $select('.msg-display');

let errorBag = {},
    _token = document.querySelector('meta[token]').attributes.token.value;

const validationOptions = [
    {
        attribute: 'validate',
        isValid: input => input.value.trim() !== '',
        msg: label => `${label.textContent} is not valid`
    },
    {
        attribute: 'email',
        isValid: input => {
            let regEx = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
            return !!input.value.match(regEx);
        },
        msg: label => `${label.textContent} is not a valid email-address`
    },
    {
        attribute: 'password',
        isValid: input => {
            let regExp = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,16}$/;
            return !!input.value.match(regExp);
        },
        msg: label => `${label.textContent} length must be 8-16, lowercase and digit`
    },
    {
        attribute: 'phone',
        isValid: input => {
            let regExp = /^\d{7,15}$/;
            return !!input.value.match(regExp)
        },
        msg: label => `${label.textContent} is not valid`
    },
    {
        attribute: 'card_number',
        isValid: input => {
            let regExp = /^\d{16}$/;
            return !!input.value.match(regExp)
        },
        msg: label => `${label.textContent} is not valid`
    },
    {
        attribute: 'cvc',
        isValid: input => {
            let regExp = /^\d{3}$/;
            return !!input.value.match(regExp)
        },
        msg: label => `${label.textContent} is not valid`
    },
    {
        attribute: 'date',
        isValid: input => {
            let regExp = /^\d{4}-\d{2}-\d{2}$/;
            return !!input.value.match(regExp)
        },
        msg: label => `${label.textContent} is not valid`
    },
];


function validateFormGroup(form){

    if(form){
        const formGroup = Array.from(form.querySelectorAll('.form-group'));

        formGroup.forEach(form => validateField(form));

    } else{
        console.error('Error: Not a valid Form');
    }
}

function validateField(field){
    let msg = field.nextElementSibling,
        input = field.querySelector('input'),
        label = field.querySelector('label'),
        formError;

    for (const options of validationOptions){
        if(!options.isValid(input) && input.hasAttribute(options.attribute)){
            formError = true;
            msg.innerHTML = options.msg(label);

            errorBag["registerForm"] = {};
            errorBag.registerForm = {valid: false};
        } else{
            if(options.isValid(input)){
                errorBag.registerForm = {valid: true};
            }
        }
    }

    if(!formError){
        msg.textContent = '';

    } else{
        input.classList.add('error');
    }
}

if(registerForm){
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();

        validateFormGroup(registerForm);
        let status;
        let formData = new FormData(registerForm);
        formData.append('_token', _token);

        if(errorBag.registerForm.valid){
            console.log()
            fetch('http://localhost:8000/register/local', {
                method: 'POST',
                body: formData
            }).then(res => {
                status = res.status;
                return res.json()
            }).then(data => {
                if(status === 200){
                    msgDisplay.classList.add('success');

                    setTimeout(() => {
                        location.href = data.redirect;
                    }, 2000)

                } else{
                    msgDisplay.classList.add('error');

                    setTimeout(() => {
                        msgDisplay.animate(keyFrames, timing).finished.then(() => setTimeout(() => msgDisplay.classList.add('d-none'), 100))
                    }, 3000);
                }

                msgDisplay.classList.remove('d-none');
                msgDisplay.querySelector('span').innerHTML = data.message;

                console.log(data)
            });
        }

    });

    registerForm.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', (e) => {
            // validateFormGroup(registerForm)
            let field = e.target.parentElement;
            validateField(field);
        });
    });
}

let keyFrames = [
    {
        opacity: 1
    },
    {
        opacity: 0
    }
];

let timing = {
    duration: 100
}

if(loginForm){
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let status;
        let formData = new FormData(loginForm);
        formData.append('_token', _token);

        validateFormGroup(loginForm);
        if(errorBag.registerForm.valid){
            fetch('http://localhost:8000/authenticate/local', {
                method: 'POST',
                body: formData
            }).then(res => {
                status = res.status;
                return res.json()
            }).then(data => {
                if(status === 200){
                    msgDisplay.classList.add('success');

                    setTimeout(() => {
                        location.href = data.redirect;
                    }, 2000)

                } else{
                    msgDisplay.classList.add('error');

                    setTimeout(() => {
                        msgDisplay.animate(keyFrames, timing).finished.then(() => setTimeout(() => msgDisplay.classList.add('d-none'), 100))
                    }, 3000);
                }

                msgDisplay.classList.remove('d-none');
                msgDisplay.querySelector('span').innerHTML = data.message;
            });
        }

        console.log(errorBag);
    });

    loginForm.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', (e) => {
            // validateFormGroup(registerForm)
            let field = e.target.parentElement;
            validateField(field);
        });
    });
}

if(cardForm){
    cardForm.addEventListener('submit', (e) => {
        e.preventDefault();

        validateFormGroup(cardForm);
        let status;
        let formData = new FormData(cardForm);
        formData.append('_token', _token);

        if(errorBag.registerForm.valid){
            fetch('http://localhost:8000/card/register', {
                method: 'POST',
                body: formData,
            }).then(res => res.json()).then(data => {
                loader.classList.remove('d-none');
                loader.classList.add('d-block');

                setTimeout(() => {
                    loader.classList.remove('d-block');
                    loader.classList.add('d-none');

                    location.reload();
                }, 1500);
            });
        }
    });

    cardForm.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', (e) => {
            // validateFormGroup(registerForm)
            let field = e.target.parentElement;
            validateField(field);
        });
    });
}
