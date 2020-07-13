$(document).ready(() => {

    $(".task-update-pending").on("click", function () {
        const id = $(this).data("id");
        const isCompleted = {
            completed: 1
        };
        updateCompleted(id, isCompleted)
    });

    $(".task-update-completed").on("click", function () {
        const id = $(this).data("id");
        const isCompleted = {
            completed: 0
        };
        updateCompleted(id, isCompleted)
    });

    $(".task-edit").on("click", function () {
        const id = $(this).data("id");
        const title = $(".card-" + id).find("h5").text();
        const description = $(".card-" + id).find(".card-description").text();
        $(".modal-submit").attr("data-id", id);
        $(".update-title").val(title);
        $(".update-description").val(description);

    })

    $(".modal-submit").on("click", function () {
        const id = $(this).data("id");
        const taskObj = {
            title: $(".update-title").val().trim(),
            description: $(".update-description").val().trim()
        }
        console.log(taskObj);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "tasks/update/" + id,
            method: 'PUT',
            data: taskObj,
            success: function (response) {
                console.log(response);

                window.location.href = '/tasks';
            }
        });

    })

    $(".task-delete").on("click", function () {
        const id = $(this).data("id");
        deleteTask(id)
    });

    function updateCompleted(id, data) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "tasks/" + id,
            method: 'PUT',
            data: data,
            success: function (response) {
                window.location.href = '/tasks';
            }
        });
    }
    function deleteTask(id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "tasks/" + id,
            method: 'DELETE',
            success: function (response) {
                window.location.href = '/tasks';
            }
        });
    }




})
