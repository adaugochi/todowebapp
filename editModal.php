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
                <form action="save-todo.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="id" name="id">
                        <label for="todo">Todo Item</label>
                        <input type="text" class="form-control todo" id="todo" name="to_do_item">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="UPDATE">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>