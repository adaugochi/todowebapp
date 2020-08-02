<!-- The Modal -->
<div class="modal fade" id="deleteTodoModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Todo Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="save-todo.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="id" name="id">
                        <p>Are you sure to want to delete this to-do item?</p>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success" value="YES">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>