export function sendMessage(url) {
    const username = document.getElementById('username').value;
    const message = document.getElementById('message').value;
    const type = document.getElementById('message-type').value;
    if (message.trim() === '') return;

    axios.post(url, {
        userName: username,
        content: message,
        type : type,
    }).then(() => {
        document.getElementById('message').value = '';
    }).catch(error => {
        console.error('Error sending message:', error);
    });
}