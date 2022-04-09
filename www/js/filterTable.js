$(function () {

    var select = $("#userSelect")

    select.change(() => {

        var user = select.val()

        var table = document.getElementById("tasksTable");
        var tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (user == "all") {
                    tr[i].style.display = "";
                } else {
                    if (txtValue.indexOf(user) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    })
})