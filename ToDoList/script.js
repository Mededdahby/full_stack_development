const form = document.querySelector("#new-task-form");
const input = document.querySelector("#new-task-input");
const submit = document.querySelector("#new-task-submit");
const tasks = document.querySelector("#tasks");
const edit = document.querySelector(".edit");
const delet = document.querySelector(".delete")
const task_in = document.querySelector('.task')
const date = document.querySelector(".dat");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const task = input.value;
    const task_el = document.createElement("div");
    task_el.classList.add("task");
    const task_content_el = document.createElement("div");
    task_content_el.classList.add("content");
    task_el.appendChild(task_content_el);

    tasks.appendChild(task_el);
    const action_el = document.createElement("div");
    action_el.classList.add("actions")
    task_el.appendChild(action_el)
    const del = document.createElement("button");
    del.classList.add("delete");
    const ed = document.createElement("button");
    ed.classList.add("edit");
    ed.innerHTML = "edit"
    del.innerHTML = "delete"
    action_el.appendChild(ed);
    action_el.appendChild(del)
    const text_el = document.createElement('input')
    text_el.classList.add("text");
    text_el.type = "text";
    text_el.value = task;
    text_el.setAttribute("readonly", "readonly");
    task_content_el.appendChild(text_el);
    const textp = document.createElement('p')
    textp.classList.add("dat");
    const t = new Date();
    textp.textContent = `${t.getDay()}/${t.getMonth()}/${t.getFullYear()}/${t.getHours()}`;
    task_content_el.appendChild(textp);
    // const save = localStorage.getItem('notes', JSON.stringify(textp));
    // console.log(save);

    //Delete
    del.addEventListener("click", (e) => {
        e.preventDefault();
        tasks.removeChild(task_el)
    })
    //Edit
    ed.addEventListener("click", (e) => {
        e.preventDefault();
        if (ed.innerText.toLowerCase() == "edit") {
            text_el.removeAttribute("readonly");
            ed.innerHTML = "save"
        }
        else {
            text_el.setAttribute("readonly", "readonly");
            ed.innerHTML = "edit"
        }

    })
})


