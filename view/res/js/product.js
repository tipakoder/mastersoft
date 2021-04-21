function mouseDown(e){
    if(e.target.closest('.block') === null && document.getElementById("popup-product")?.style.display != "none"){
        hidePopup();
    }
}

function showPopup(id){
    let popup = document.getElementById("popup-product");
    popup.querySelector(".image").style.backgroundImage = "url('"+document.getElementById(id+"_product_image").src+"')";
    popup.querySelector(".btn").setAttribute("onclick","answer_send("+id+")");
    popup.style.display = "flex";
}

function hidePopup(){
    document.getElementById("popup-product").style.display = "none";
}

function answer_send(id){
    let answer_name = document.getElementById("answer_name").value;
    let answer_tel = document.getElementById("answer_tel").value;
    let answer_text = document.getElementById("answer_text").value;
    
    let data = new FormData();
    data.append("service", id);
    data.append("name", answer_name);
    data.append("tel", answer_tel);
    data.append("text", answer_text);

    fetch("/product/answer/add/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            alert("Ожидайте нашего звонка!");
        } else {
            alert(res.data);
        }

        hidePopup();
    }).catch((err)=>{
        console.log(err)
    });
}

document.addEventListener("mousedown", mouseDown);