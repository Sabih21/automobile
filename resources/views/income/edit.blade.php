<div class="modal fade" id="editIncomeModal" tabindex="-1" role="dialog" aria-labelledby="editIncomeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIncomeModalLabel">Edit Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editIncomeForm">
                    <input type="hidden" id="editIncomeId" name="editIncomeId" value="">
                    <div class="form-group">
                        <label for="editSource">Source:</label>
                        <input type="text" class="form-control" id="editSource" name="editSource" required>
                    </div>
                    <div class="form-group">
                        <label for="editDate">Date:</label>
                        <input type="date" class="form-control" id="editDate" name="editDate" required>
                    </div>
                    <div class="form-group">
                        <label for="editAmount">Amount:</label>
                        <input type="number" class="form-control" id="editAmount" name="editAmount" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateIncome()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(response) {
        $('#editIncomeId').val(response.id);
        $('#editSource').val(response.source);
        $('#editDate').val(response.date);
        $('#editAmount').val(response.amount);

    }

    function updateIncome() {
        var incomeId = $('#editIncomeId').val();
        var source = $('#editSource').val();
        var date = $('#editDate').val();
        var amount = $('#editAmount').val();

        var data = {                                    
            id: incomeId,
            source: source,
            date: date,
            amount: amount
        };

        $.ajax({
            type: 'PUT', // Assuming you use PUT for updating records
            url: '{{ url('incomes') }}/' + incomeId,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Income updated successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#editIncomeModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
            }
        });
    }
</script>
