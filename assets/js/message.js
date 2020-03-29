class Message{
    _sender;
    _recipient;
    _message; 
    _time;
    _isRead = false;


    get isRead() {
        return this._isRead;
    }
    set isRead(value) {
        this._isRead = value;
    }

    Message(sender, recipient, message, time){
        _sender = sender;
        _recipient = recipient;
        _message = message;
        _time = time;
    };

    
}