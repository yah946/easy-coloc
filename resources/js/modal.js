import './bootstrap';
const btn = document.getElementById('show-modal');
const modal = document.getElementById('modal');
const xmark = document.getElementById('xmark');
const cancel = document.getElementById('cancel');
const overlay = document.getElementById('overlay')
    
btn.addEventListener('click',function(){
    modal.classList.remove('hidden');
});
xmark.addEventListener('click',function(){
    modal.classList.add('hidden');
});
cancel.addEventListener('click',function(){
    modal.classList.add('hidden');
});
overlay.addEventListener('click',function(){
    modal.classList.add('hidden');
});