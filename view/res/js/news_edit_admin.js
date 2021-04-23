function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id).css('background-image', "url('"+e.target.result+"')");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_article").change(function(){readURL(this, "image_preview")});

function send(id){
    let title = document.getElementById("title_article").value;
    let text = document.getElementById("text_article").value;
    let image = document.getElementById("image_article").files[0];
    let data = new FormData();
    data.append("id", title);
    data.append("title", title);
    data.append("text", text);
    data.append("image", image);

    fetch("/admin/news/edit/"+id+"/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.href="/admin/news/";
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

$("form").submit(function(e){
    e.preventDefault();
    send(this.id);
});