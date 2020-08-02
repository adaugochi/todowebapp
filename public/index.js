(function ($) {
    let editTodo = $("[data-target='editTodo']"),
        editTodoModal = $("#editTodoModal"),
        deleteTodo = $("[data-target='deleteTodo']"),
        deleteTodoModal = $("#deleteTodoModal"),
        markCompleteTodo = $("[data-target='markCompleteTodo']"),
        markCompleteTodoModal = $("#markCompleteTodoModal"),
        todoId = $(".id"),
        todoItem = $(".todo");


    editTodo.on('click', function (e) {
        e.preventDefault();
        editTodoModal.modal('show');
        todoItem.val($(this).data('todo'));
        todoId.val($(this).data('id'))
    });

    deleteTodo.on('click', function (e) {
        e.preventDefault();
        deleteTodoModal.modal('show');
        todoId.val($(this).data('id'))
    });

    markCompleteTodo.on('click', function (e) {
        e.preventDefault();
        markCompleteTodoModal.modal('show');
        todoId.val($(this).data('id'))
    });
})(jQuery);