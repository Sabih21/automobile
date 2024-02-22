<div class="modal fade" id="addExpenceModal" tabindex="-1" role="dialog" aria-labelledby="addExpenceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExpenceModalLabel">Add Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addExpenceForm">
                    <div class="form-group">
                        <label for="expence_type_id">Expense Type:</label>
                        <select class="form-control" id="expence_type_id" name="expence_type_id" required>
                            @foreach ($expenseTypes as $expenseType)
                                <option value="{{ $expenseType->id }}"
                                    {{ old('expence_type_id', isset($expense) ? $expense->expence_type_id : null) == $expenseType->id ? 'selected' : '' }}>
                                    {{ $expenseType->title }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveExpence()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function saveExpence() {
        var expenceTypeId = $('#expence_type_id').val();
        var amount = $('#amount').val();
        var date = $('#date').val();
        var description = $('#description').val();

        var data = {
            expence_type_id: expenceTypeId,
            amount: amount,
            date: date,
            description: description
        };
        $.ajax({
            type: 'POST',
            url: '{{ route('expences.store') }}',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Expense saved successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#addExpenceModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
            }
        });
    }
</script>
