function new_service(){
    let el = document.createElement('div');
    el.className = "item";
    el.innerHTML = `
    <input type="file" class="input_image">
    <div class="image_preview noload"></div>
    <input class="input_name" type="text" placeholder="Название услуги">
    <button class="btn" onclick="save_service()">Сохранить</button>
    `;
    // Change preview image
    el.querySelector(".input_image").addEventListener("change", function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            this.parentElement.querySelector(".image_preview").classList.remove("noload");
            this.parentElement.querySelector(".image_preview").style.backgroundImage = "url('"+e.target.result+"')";
        }
        reader.readAsDataURL(this.files[0]);
    });
    el.querySelector(".btn").onclick = save_service;
    document.getElementById("services_list").appendChild(el);
}

function save_service(){
    let data = new FormData();
    data.append("id", document.getElementById("product-new").getAttribute("for"));
    data.append("image", this.parentElement.querySelector(".input_image").files[0]);
    data.append("name", this.parentElement.querySelector(".input_name").value);
    fetch("/admin/products/service/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            alert("Успех!");
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

function delete_service(){
    let data = new FormData();
    data.append("id", this.parentElement.getAttribute("for"));
    fetch("/admin/products/service/delete/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            alert("Успех!");
            this.parentElement.remove();
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

function save_product(){
    let data = new FormData();
    data.append("icon", document.getElementById("product_icon").value);
    data.append("display_name", document.getElementById("product_displayname").value);
    data.append("code_name", document.getElementById("product_codename").value);
    data.append("text", document.getElementById("product_text").value);
    fetch("/admin/products/new/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.href="/admin/products/"+document.getElementById("product_codename").value+"/";
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

function update_product(){
    let data = new FormData();
    data.append("id", document.getElementById("product-new").getAttribute("for"));
    data.append("icon", document.getElementById("product_icon").value);
    data.append("display_name", document.getElementById("product_displayname").value);
    data.append("code_name", document.getElementById("product_codename").value);
    data.append("text", document.getElementById("product_text").value);
    fetch("/admin/products/update/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.href="/admin/products/"+document.getElementById("product_codename").value+"/";
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

function delete_product(){
    let data = new FormData();
    data.append("id", document.getElementById("product-new").getAttribute("for"));
    fetch("/admin/products/delete/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.href="/admin/products/";
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err)
    });
}

document.addEventListener("DOMContentLoaded", function(){
    for(let service of document.getElementById("services_list").children){
        service.querySelector(".btn").onclick = delete_service;
    }
});