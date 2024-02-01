<div class="modal fade" id="editExpenceModal" tabindex="-1" role="dialog" aria-labelledby="editExpenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExpenceModalLabel">Edit Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editExpenceForm">
                    <input type="hidden" id="editExpenceId" name="editExpenceId" value="">
                    <div class="form-group">
                        <label for="editExpenceTypeId">Expense Type1:</label>
                        <select class="form-control" id="expence_type_id" name="expence_type_id" required>
                            @foreach ($expenseTypes as $expenseType)
                               <option value="{{ $expenseType->id }}" {{ old('expence_type_id', isset($expense) ? $expense->expence_type_id : null) == $expenseType->id ? 'selected' : '' }}>
    {{ $expenseType->title }}
</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editAmount">Amount:</label>
                        <input type="number" class="form-control" id="editAmount" name="editAmount" required>
                    </div>
                    <div class="form-group">
                        <label for="editDate">Date:</label>
                        <input type="date" class="form-control" id="editDate" name="editDate" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description:</label>
                        <textarea class="form-control" id="editDescription" name="editDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateExpence()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditExpenceModal(response) {
        $('#editExpenceId').val(response.id);
        $('#editExpenceTypeId').val(response.expence_type_id);
        $('#editAmount').val(response.amount);
        $('#editDate').val(response.date);
        $('#editDescription').val(response.description);
    }

    function updateExpence() {
        var expenceId = $('#editExpenceId').val();
        var expenceTypeId = $('#editExpenceTypeId').val();
        var amount = $('#editAmount').val();
        var date = $('#editDate').val();
        var description = $('#editDescription').val();

        var data = {
            expence_type_id: expenceTypeId,
            amount: amount,
            date: date,
            description: description
        };

        $.ajax({
            type: 'PUT',
            url: '{{ url('expences') }}/' + expenceId,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Expense updated successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#editExpenceModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
            }
        });
    }
</script>
