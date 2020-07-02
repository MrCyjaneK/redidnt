function vote(reaction = '+', postid = 1) {
    console.log(`Voting '${ reaction }' on '${ postid }'`);
    var response = post('/api.php', {
        "action": "react",
        "reaction": reaction,
        "postid": postid
    });
    alert(response.text);
}

function post(endpoint, data) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", endpoint, false); // true for asynchronous
                                           // TODO.................
    xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlHttp.send(JSON.stringify(data));
    return JSON.parse(xmlHttp.responseText);
}
