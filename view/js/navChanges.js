const button1 = document.getElementById('button1');
const button2 = document.getElementById('button2');
const button3 = document.getElementById('button3');

button1.addEventListener('click',()=>{
    button1.classList = 'active';
    button2.classList = '';
    button3.classList = '';
});
button2.addEventListener('click',()=>{
    button2.classList = 'active';
    button3.classList = '';
    button1.classList = '';
});
button3.addEventListener('click',()=>{
    button3.classList = 'active';
    button2.classList = '';
    button1.classList = '';
});

