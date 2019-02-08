let api = "http://api.localhost/";
let formData = new FormData();
let page = document.querySelector("body").dataset.page;
let headers = new Headers();
headers.append("token", getToken());

if(page == "home") {

    let submit = document.querySelector("#submit");
    submit.onclick = function(){
        formData.append('email', document.querySelector("#email").value);
        formData.append('password',  document.querySelector("#password").value);

        fetch(api + "login", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(function(response) {
            if(response.status) {
                document.cookie = "api_token=" + response.api_token + ";path=/";
                window.location.replace("list.html");
            } else {
                let errorBox = document.querySelector(".error");
                errorBox.innerHTML = "Wrong username or password"
            }
        })
        .catch(error => console.error('Error:', error));
    }

}

if(page == "list") {

    let list = document.querySelector(".list");
    let newTodo = document.querySelector("#new-todo");
    let listItemElement, listContent, listDone, listDelete;

    render();

    //get items
    function render(){

        // first clear list
        list.innerHTML = "";

        fetch(api + "items", {
            method: 'GET',
            headers: headers
        })
        .then(res => res.json())
        .then(function(items) {
            if(items.success){
                for (item of items.data) {

                    listItemElement = document.createElement("div");

                    listContent = document.createElement("p");
                    listDone = document.createElement("a");
                    listDelete = document.createElement("span");

                    listContent.innerHTML = item.content;
                    listDelete.innerHTML = "X";
                    listDone.setAttribute("data-id", item.id);
                    listDelete.setAttribute("data-id", item.id);

                    if(item.done == 1){
                        listDone.setAttribute("class", "done true");
                    } else {
                        listDone.setAttribute("class", "done false");
                    }

                    listDelete.setAttribute("class", "delete");

                    listItemElement.appendChild(listDelete);
                    listItemElement.appendChild(listContent);
                    listItemElement.appendChild(listDone);
                    list.appendChild(listItemElement);

                    let markDoneButton = document.querySelectorAll(".done");
                    for (var i = 0; i < markDoneButton.length; i++) {
                        markDoneButton[i].addEventListener("click", function() {
                            if(this.classList.contains("false")){
                                doneClicked(this);
                            }
                        });
                    }

                    let deleteButton = document.querySelectorAll(".delete");
                    for (var i = 0; i < deleteButton.length; i++) {
                        deleteButton[i].addEventListener("click", function() {
                            deleteClicked(this);
                        });

                    }
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    //mark as done function
    function doneClicked(button) {

        formData.set("id", button.dataset.id);
        fetch(api + "mark-done", {
            method: 'POST',
            body: formData,
            headers: headers
        })
        .then(res => res.json())
        .then(function(response) {
             console.log(response);
            if(response.success) {
                button.classList.remove("false");
                button.classList.add("true");
            } else {
                console.log(false);
            }
        })
        .catch(error => console.error('Error:', error));

    }

    //delete function
    function deleteClicked(button) {

        fetch(api + "delete/" + button.dataset.id, {
            method: 'DELETE',
            headers: headers
        })
        .then(res => res.json())
        .then(function(response) {
            if(response.success) {
                button.parentNode.remove()
            } else {
                console.log(false);
            }
        })
        .catch(error => console.error('Error:', error));

    }

    //insert new content
    newTodo.addEventListener("keyup", function(event) {
        if (event.key === "Enter" && newTodo.value.length > 3) {
            addNew(newTodo.value);
        }
    });

    function addNew(content){

        formData.set("content", content)

        fetch(api + "create", {
            method: 'POST',
            body: formData,
            headers: headers
        })
        .then(res => res.json())
        .then(function(response) {
            if(response.success) {
                newTodo.value = "";
                render();
            } else {
                console.log(false);
            }
        })
        .catch(error => console.error('Error:', error));
    }

}

//get token from cookie
function getToken() {
    return document.cookie.split("=")[1];
}
