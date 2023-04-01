<div class="modal fade" id="taskDeleteModal" tabindex="-1" role="dialog" aria-labelledby="taskDeleteModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskDeleteModalTitle">Delete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete task "<span id="deleteTaskName"></span>"?
            </div>
            <div class="modal-footer">
                <form action="/task/delete/" method="post" id="taskDeleteForm">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
