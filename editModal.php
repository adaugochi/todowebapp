<!-- The Modal -->
<div class="modal fade" id="editTodoModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Todo Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="update-todo.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="id" name="id">
                        <label for="todo">Todo Item</label>
                        <input type="text" class="form-control todo" id="todo" name="to_do_item">
                    </div>

                    <input type="submit" name="update" class="btn btn-success" value="Update">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>