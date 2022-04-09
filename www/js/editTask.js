function editTask(taskId) {

    var icon = document.getElementById("icon" + taskId)

    // Hide old elements
    document.querySelector('td#task' + taskId + ' > div#taskDiv' + taskId).style.display = "none"
    document.querySelector('td#deadline' + taskId + ' > div#deadlineDiv' + taskId).style.display = "none"
    icon.style.display = "none"

    // Show new elements
    var taskInput = document.getElementById("taskInput" + taskId)
    taskInput.classList.remove('d-none')

    var deadlineInput = document.getElementById("deadlineInput" + taskId)
    deadlineInput.classList.remove('d-none')

    var submitIcon = document.getElementById("submitIcon" + taskId)
    submitIcon.classList.remove('d-none')

    taskInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            submitIcon.click();
        }
    });

    deadlineInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            submitIcon.click();
        }
    });

}

function submitTask(taskId) {
    var task = $("#taskInput" + taskId).val()
    var deadline = $("#deadlineInput" + taskId).val()

    naja.makeRequest(
        "POST",
        $("#submitIcon" + taskId).data("url"),
        { taskId: taskId, taskText: task, deadline: deadline }
    )
}