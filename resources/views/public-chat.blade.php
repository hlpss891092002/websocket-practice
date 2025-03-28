<!DOCTYPE html>
<html>
<head>
    <title>Open Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/publicChat.js'])
</head>
<body>
    <div id="app" class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Open Chat</h1>
        <div id="messages" class="mb-4 h-64 overflow-y-scroll border p-2"></div>
        <input type="text" id="username" placeholder="Your Name" class="mb-2 w-full p-2 border">
        <input type="text" id ="message-type" value = "public" style="display: none" >
        <div class="flex">
            <input type="text" id="message" placeholder="Type a message" class="flex-grow p-2 border mr-2">
            <button onclick="sendMessage('api/public/send-message')" class="bg-blue-500 text-white px-4 py-2">Send</button>
        </div>
    </div>
</body>
</html>