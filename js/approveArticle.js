// Article Approval 

var accepted = [];
var rejected = [];

function acceptId(id) {
    let article_id = id.slice(6, );

    let rejectBtn = document.getElementById('reject' + article_id);
    rejectBtn.classList.add("disabled");

    if (!accepted.includes(article_id)) {
        accepted.push(article_id);
    }
}

function rejectId(id) {
    let article_id = id.slice(6, );

    let acceptBtn = document.getElementById('accept' + article_id);
    acceptBtn.classList.add("disabled");

    if (!rejected.includes(article_id)) {
        rejected.push(article_id);
    }
}


saveBtn.addEventListener('click', function() {
    dataAccept.value = accepted.toString();
    dataReject.value = rejected.toString();
})