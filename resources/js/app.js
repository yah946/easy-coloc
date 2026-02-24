import './bootstrap';
// NavBar
const navEditProfile = document.getElementById('nav-edit_profile');
const navChangePassword = document.getElementById('nav-change_password');

const editProfile = document.getElementById('edit_profile');
const changePassword = document.getElementById('change_password');
// Buttons
const arrow = document.getElementById('arrow');
const buttons = document.querySelectorAll('.toggle-password');
console.log(buttons);
// Show Hide Password
buttons.forEach(button => {
    button.addEventListener('click',(e)=>{
        e.preventDefault();
        const input = button.closest('div').querySelector('.password-input');
        const show = button.querySelector('.show-pass');
        const hide = button.querySelector('.hide-pass');
        if(input.type==='password'){
            input.type = 'text';
            show.classList.add('hidden');
            hide.classList.remove('hidden');
        }   
        else{
            input.type = 'password';
            show.classList.remove('hidden');
            hide.classList.add('hidden');
        }
    });
});
// NavBar Event
navEditProfile.addEventListener('click',function(){
    arrow.classList.remove('hidden')
    editProfile.classList.remove('hidden')
    changePassword.classList.add('hidden')
})
navChangePassword.addEventListener('click',function(){
    editProfile.classList.add('hidden')
    changePassword.classList.remove('hidden')
    arrow.classList.remove('hidden')
})
arrow.addEventListener('click',function(){
    editProfile.classList.add('hidden')
    changePassword.classList.add('hidden')
    arrow.classList.add('hidden')

})

