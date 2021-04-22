function process_review(type, id){
    let text = document.getElementById(id+"_review_text").value;
    let data = new FormData();
    data.append("id", id);
    data.append("type", type);
    data.append("text", text);

    fetch("/admin/reviews/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            document.getElementById(id+"_review").remove();
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}