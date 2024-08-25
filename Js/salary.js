const nextButton = document.querySelector('.btn-next');
const prevButton = document.querySelector('.btn-prev');
const subButton = document.querySelector('.btn-submit')
const steps = document.querySelectorAll('.step');
const form_steps = document.querySelectorAll('.form-step');
let active = 1;

nextButton.addEventListener('click', () => {
    active++;
    if (active > steps.length) {
        active = steps.length;
    }
    updateprogress();
});

prevButton.addEventListener('click', () => {
    active--;
    if (active < 1) {
        active = 1;
    }
    updateprogress();
});

const updateprogress = () => {
    console.log('steps.length => ' + steps.length);
    console.log('active => ' + active);

    steps.forEach((step, i) => {
        if (i == (active - 1)) {
            step.classList.add('active');
            form_steps[i].classList.add('active');
            console.log('i => ' + i);
        } else {
            step.classList.remove('active');
            form_steps[i].classList.remove('active');
        }
    });

    if (active === 1) {
        prevButton.disabled = true;
        nextButton.disabled=false;
        subButton.disabled=true
    } else if (active === steps.length) {
        nextButton.disabled = true;
        prevButton.disabled=false;
        subButton.disabled=false;
    } else {
        prevButton.disabled = false;
        nextButton.disabled = false;
    }
}