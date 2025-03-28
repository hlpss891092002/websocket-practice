import { loginAndGetToken } from './utilities/loginFunction.js'
const access_token = localStorage.getItem('access_token');
if(access_token){
    window.location.href = '/dashboard'
}
document.querySelector('.login-form').addEventListener('submit', function(event){
    event.preventDefault();
    loginAndGetToken();
} );