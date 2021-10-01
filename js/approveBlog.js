// Blog Approval 

var accepted = [];
var rejected = [];

function acceptId(id) {
    let blog_id = id.slice(6, );

    let rejectBtn = document.getElementById('reject' + blog_id);
    rejectBtn.classList.add("disabled");

    if (!accepted.includes(blog_id)) {
        accepted.push(blog_id);
    }
}

function rejectId(id) {
    let blog_id = id.slice(6, );

    let acceptBtn = document.getElementById('accept' + blog_id);
    acceptBtn.classList.add("disabled");

    if (!rejected.includes(blog_id)) {
        rejected.push(blog_id);
    }
}


saveBtn.addEventListener('click', function() {
    dataAccept.value = accepted.toString();
    dataReject.value = rejected.toString();
})