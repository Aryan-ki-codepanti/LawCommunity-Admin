// Internship Approval 

var accepted = [];
var rejected = [];

function acceptId(id) {
    let internship_id = id.slice(6, );

    let rejectBtn = document.getElementById('reject' + internship_id);
    rejectBtn.classList.add("disabled");

    if (!accepted.includes(internship_id)) {
        accepted.push(internship_id);
    }
}

function rejectId(id) {
    let internship_id = id.slice(6, );

    let acceptBtn = document.getElementById('accept' + internship_id);
    acceptBtn.classList.add("disabled");

    if (!rejected.includes(internship_id)) {
        rejected.push(internship_id);
    }
}


saveBtn.addEventListener('click', function() {
    dataAccept.value = accepted.toString();
    dataReject.value = rejected.toString();
})