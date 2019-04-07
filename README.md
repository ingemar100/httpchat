# httpchat
Chatserver based on public json api built in PHP

Documentation

submit.php
  submits a chat message
  needs three parameters:
    user (string, max 20 characters) the username of the sender
    message (string, max 500 characters) the message 
    destination (string, max 20 characters) the username of the intended receiver

  returns success or an error message in json format


chat.php
  returns all messages sent to a specific user
  needs one parameter:
    user - the username to get messages for

  Returns JSON in this format
  [{"user":"John", "message":"Hello world", "time":"1234567890"}]

