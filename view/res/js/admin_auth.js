function auth(){
    let login = document.getElementById("login_auth").value;
    let password = document.getElementById("password_auth").value;
    let data = new FormData();
    data.append("login", login);
    data.append("password", password);

    fetch("/admin/auth/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.href = "/admin/";
        } else {
            alert(res.data);
        }

        hidePopup();
    }).catch((err)=>{
        console.log(err)
    });
}