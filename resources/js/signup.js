import { signupAndCheckSuccess } from './utilities/signupFunction.js'
document.querySelector('.signup-form').addEventListener('submit', function(event){
    event.preventDefault();
    signupAndCheckSuccess();
} );