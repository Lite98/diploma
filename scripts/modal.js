document.getElementById("open-modal").addEventListener("click",function(){
    document.getElementById("modal").classList.add("open")
})

document.getElementById("back_modal-btn").addEventListener("click",function(){
    document.getElementById("modal").classList.remove("open")
})