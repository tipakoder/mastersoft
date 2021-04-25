function adviceProcess (id){
    let data = new FormData();
    data.append("id", id);

    fetch("/admin/advice/process/", {
        body: data,
        method: "POST"
    }).then(async(res) => {
        return res.json();
    }).then((res)=>{
        if(res?.type === "success"){
            location.reload();
        } else {
            alert(res.data);
        }
    }).catch((err)=>{
        console.log(err);
    });
}