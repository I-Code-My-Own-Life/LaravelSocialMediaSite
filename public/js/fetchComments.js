let fetchCommentsBtn = document.getElementsByClassName('fetchCommentsBtn');
// let commentSection = document.getElementById('commentSection');

let comments = [];
Array.from(fetchCommentsBtn).forEach((btn) => {
    btn.addEventListener("click", () => {

        let commentContainer = `<section style="width:700px;">
                    <div class="container my-8 py-8">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div id="divThatHasComments" class="card text-dark">
                                    <div class="card-body p-2">
                                        <h2 style="font-size:20px;margin-left:20px;" class="fw-light my-1 pb-2">Latest Comments by users</h2>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div>
        </section>`;
        // Display the comment sectison : 
        let div = btn.parentElement.parentElement.parentElement.parentElement.parentElement;
        
        div.innerHTML += commentContainer;
        div.style.display = "flex";
        div.style.justifyContent = "center";
        // Make an ajax request to fetch comments :
        let xhr = new XMLHttpRequest();

        let postId = Number(btn.id.split('btn')[1]);

        // Making our connection 
        var url = `/comments/${postId}`;
        xhr.open("GET", url, true);

        // Function execute after request is successful
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                comments = JSON.parse(this.response);
                comments.forEach((comment) => {
                    let divThatHasComments = document.getElementById('divThatHasComments');
                    console.log(comment);
                    let singleComment = `<hr class="my-0" />
                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img style="height:50px" class="rounded-circle shadow-1-strong me-3"
                                                src="/storage/${comment.user.profile.avatar}"
                                                alt="avatar" width="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">${comment.user.name}</h6>
                                                <div class="d-flex align-items-center mb-1">
                                                    <p style="font-size:12px;" class="mb-0">
                                                        March 15, 2021
                                                        <span class="mx-2 badge bg-success">Approved</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="text-success"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-danger"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p style="font-size:14px" class="mb-0">
                                                    ${comment.content}
                                                </p>
                                            </div>
                                        </div>
                    </div>`;

                    divThatHasComments.innerHTML += singleComment;
                })
            }
        }
        // Sending our request
        xhr.send();
    })
})