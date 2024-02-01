<!-- resources/views/expence_type/create.blade.php -->

<div class="modal fade" id="addExpenseTypeModal" tabindex="-1" role="dialog" aria-labelledby="addExpenseTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExpenseTypeModalLabel">Add Expense Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addExpenseTypeForm">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveExpenseType()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function saveExpenseType() {
        var title = $('#title').val();

        var data = {
            title: title
        };

        $.ajax({
            type: 'POST',
            url: '{{ route('expence_types.store') }}',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Expense Type saved successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#addExpenseTypeModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
            }
        });
    }
</script>
