// Event Approval 


var accepted = [];
var rejected = [];

function acceptId(id) {
    let event_id = id.slice(6, );

    let rejectBtn = document.getElementById('reject' + event_id);
    rejectBtn.classList.add("disabled");

    if (!accepted.includes(event_id)) {
        accepted.push(event_id);
    }
}

function rejectId(id) {
    let event_id = id.slice(6, );

    let acceptBtn = document.getElementById('accept' + event_id);
    acceptBtn.classList.add("disabled");

    if (!rejected.includes(event_id)) {
        rejected.push(event_id);
    }
}


saveBtn.addEventListener('click', function() {
    dataAccept.value = accepted.toString();
    dataReject.value = rejected.toString();
})