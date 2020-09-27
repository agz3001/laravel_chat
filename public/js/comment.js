$(function() {
    get_data();
});

function get_data() {
    $.ajax({
        url: "result/ajax/",
        dataType: "json",
        success: data => {
            $("#comment-data").find(".comment-visible").remove();
            for (var i=0; i<data.comments.length; i++){
              var html = `
                    <div class="comment-visible">
                        <div class="comment">
                            <div class="row">
                                <span class="name" id="name">${data.comments[i].name}</span>
                                <span class="time" id="time">${data.comments[i].created_at}</span>
                            </div>
                            <span class="comment" id="comment">${data.comments[i].comment}</span>
                        </div>
                    </div>
                `;

        $("#comment-data").append(html);
            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 5000);
}
