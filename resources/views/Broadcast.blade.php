<!DOCTYPE html>
<html>
<head>
    <title>Laravel Reverb Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Reverb Chat</h1>
        <div id="messages" class="mb-4 h-64 overflow-y-scroll border p-2"></div>
        <input type="text" id="username" placeholder="Your Name" class="mb-2 w-full p-2 border">
        <input type="text" id ="message-type" value = "public" style="display: none" >
        <div class="flex">
            <input type="text" id="message" placeholder="Type a message" class="flex-grow p-2 border mr-2">
            <button onclick="sendMessage()" class="bg-blue-500 text-white px-4 py-2">Send</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.Echo) {
                console.log('Echo is initialized');
                window.Echo.channel('chat')
                    .listen('MessageSent', (e) => {
                        console.log(e);
                        const messagesDiv = document.getElementById('messages');
                        const messageElement = document.createElement('div');
                        messageElement.innerHTML = `
                            <strong>${e.sender_id}</strong>: 
                            ${e.content}
                        `;
                        messagesDiv.appendChild(messageElement);
                        messagesDiv.scrollTop = messagesDiv.scrollHeight;
                    });
            } else {
                console.error('Echo is not initialized');
            }
        });

        function sendMessage() {
            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;
            const type = document.getElementById('message-type').value;
            console.log(username);
            if (message.trim() === '') return;

            axios.post('api/send-message', {
                userName: username,
                content: message,
                type : type,
            }).then(() => {
                document.getElementById('message').value = '';
            }).catch(error => {
                console.error('Error sending message:', error);
            });
        }
    </script>
</body>
</html>