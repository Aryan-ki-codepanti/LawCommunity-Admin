// Job Approval 


var accepted = [];
var rejected = [];

function acceptId(id) {
    let job_id = id.slice(6, );

    let rejectBtn = document.getElementById('reject' + job_id);
    rejectBtn.classList.add("disabled");

    if (!accepted.includes(job_id)) {
        accepted.push(job_id);
    }
}

function rejectId(id) {
    let job_id = id.slice(6, );

    let acceptBtn = document.getElementById('accept' + job_id);
    acceptBtn.classList.add("disabled");

    if (!rejected.includes(job_id)) {
        rejected.push(job_id);
    }
}


saveBtn.addEventListener('click', function() {
    dataAccept.value = accepted.toString();
    dataReject.value = rejected.toString();
})