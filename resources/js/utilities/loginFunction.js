export async function loginAndGetToken() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('api/auth/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    });
    try{
        const data = await response.json();
        console.log(data);
        const accessToken = data.access_token;
        localStorage.setItem('access_token', accessToken);
        alert('login success');
        window.location.href = '/dashboard'
    }catch (error){
        console.error("Error parsing response:", error);
        alert(error.msg);
    }
}