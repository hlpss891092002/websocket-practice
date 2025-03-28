
import {sendMessage} from './utilities/sendMessage.js';

document.addEventListener('DOMContentLoaded', () => {
    window.sendMessage = sendMessage;
    if (window.Echo) {
        console.log('Echo is initialized');
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                console.log(e);
                const messagesDiv = document.getElementById('messages');
                const messageElement = document.createElement('div');
                messageElement.innerHTML = `
                    <strong>${e.senderName}</strong>: 
                    ${e.content}
                `;
                messagesDiv.appendChild(messageElement);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            });
    } else {
        console.error('Echo is not initialized');
    }
});

