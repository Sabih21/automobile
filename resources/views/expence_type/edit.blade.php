<!-- resources/views/expence_type/edit.blade.php -->

<div class="modal fade" id="editExpenseTypeModal" tabindex="-1" role="dialog" aria-labelledby="editExpenseTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExpenseTypeModalLabel">Edit Expense Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editExpenseTypeForm">
                    <input type="hidden" id="editExpenseTypeId" name="editExpenseTypeId" value="">
                    <div class="form-group">
                        <label for="editTitle">Title:</label>
                        <input type="text" class="form-control" id="editTitle" name="editTitle" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateExpenseType()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditExpenseTypeModal(response) {
        $('#editExpenseTypeId').val(response.id);
        $('#editTitle').val(response.title);
    }

    function updateExpenseType() {
        var expenseTypeId = $('#editExpenseTypeId').val();
        var title = $('#editTitle').val();

        var data = {
            title: title
        };

        $.ajax({
            type: 'PUT',
            url: '{{ url('expence_types') }}/' + expenseTypeId,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Expense Type updated successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#editExpenseTypeModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
            }

        });
    }
</script>
