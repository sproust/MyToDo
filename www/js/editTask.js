function editTask(taskText, taskId) {

    var td = document.getElementById("task" + taskId);
    var tdIcon = document.getElementById("tdIcon" + taskId);
    var icon = document.getElementById("icon" + taskId);

    var redirect;
    var url = location.href;
    var urlParts = url.split("/");

    if (urlParts[urlParts.length - 2] == "done") {
        redirect = "Done";
    } else {
        redirect = "Homepage";
    }


    if (icon.className == "fa fa-edit editIcon pointer fa-lg") {
        var inputWidth = td.offsetWidth - 30;

        td.innerHTML = "";

        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control";
        input.style.width = inputWidth + "px";
        input.id = "input" + taskId;
        input.value = taskText;

        td.appendChild(input);

        icon.className = "fa fa-check-square editIcon pointer fa-lg";

    } else {
        var input = document.getElementById("input" + taskId);
        var newValue = input.value;

        td.removeChild(input);

        td.innerHTML = newValue;

        icon.className = "fa fa-edit editIcon pointer fa-lg";

        location.href = "/task/edit?taskId=" + taskId + "&taskText=" + newValue + "&redirection=" + redirect;
    }

}