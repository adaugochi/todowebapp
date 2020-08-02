<!-- The Modal -->
<div class="modal fade" id="markCompleteTodoModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Mark Todo As Complete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="mark-complete-todo.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="id" name="id">
                        <p>Are you sure to want to mark this to-do item as completed?</p>
                    </div>

                    <input type="submit" name="complete" class="btn btn-success" value="Yes">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </form>
            </div>

        </div>
    </div>
</div>