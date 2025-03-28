export async function signupAndCheckSuccess() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('api/auth/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: name,
            email: email,
            password: password
        })
    });
    try{
        const data = await response.json();
        console.log(data);
        alert(data.msg);
    }catch (error){
        console.error("Error parsing response:", error);
        alert(error.msg);
    }
}