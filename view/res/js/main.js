$('.slider').touchSlider({height: 400});

function mouseDown(e){
    if(e.target.closest('.block') === null && document.getElementById("popup-phone")?.style.display != "none"){
        hidePopupPhone();
    }
}

function showPopupPhone(){
    let popup = document.getElementById("popup-phone");
    popup.style.display = "flex";
}

function hidePopupPhone(){
    document.getElementById("popup-phone").style.display = "none";
}

function phone_send(){
    let phone_name = document.getElementById("phone_name").value;
    let phone_tel = document.getElementById("phone_tel").value;
    let phone_text = document.getElementById("phone_text").value;

    let data = new FormData();
    data.append("name", phone_name);
    data.append("tel", phone_tel);
    data.append("text", phone_text);

    fetch("/call/add/", {
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

        hidePopupPhone();
    }).catch((err)=>{
        console.log(err)
    });
}

document.addEventListener("mousedown", mouseDown);