function send_review(){
    let name_review = document.getElementById("name_review").value;
    let text_review = document.getElementById("text_review").value;

    let data = new FormData();
    data.append("name", name_review);
    data.append("text", text_review);

    fetch("/reviews/add/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            alert("Спасибо за Ваш отзыв!");
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}