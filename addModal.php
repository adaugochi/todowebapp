<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
    Add Todo
</button>

<!-- The Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Todo Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="save-todo.php" method="post">
                    <div class="form-group">
                        <label for="todo">Todo Item</label>
                        <input type="text" class="form-control" id="todo" name="to_do_item">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>