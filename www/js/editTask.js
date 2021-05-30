function editTask(taskId) {

    var icon = document.getElementById("icon" + taskId);

    // Hide old elements
    document.querySelector('td#task' + taskId + ' > div#taskDiv' + taskId).style.display = "none";
    document.querySelector('td#deadline' + taskId + ' > div#deadlineDiv' + taskId).style.display = "none";
    icon.style.display = "none";

    // Show new elements
    var taskInput = document.getElementById("taskInput" + taskId);
    taskInput.style.removeProperty('display');

    var deadlineInput = document.getElementById("deadlineInput" + taskId);
    deadlineInput.style.removeProperty('display');

    var submitIcon = document.getElementById("submitIcon" + taskId);
    submitIcon.style.removeProperty('display');

}