<div class="modal fade" id="addIncomeModal" tabindex="-1" role="dialog" aria-labelledby="addIncomeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIncomeModalLabel">Add Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addIncomeForm">
                    <div class="form-group">
                        <label for="source">Source:</label>
                        <input type="text" class="form-control" id="source" name="source" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>     
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                </form>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveIncome()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function saveIncome() {
        var source = $('#source').val();
        var date = $('#date').val();
        var amount = $('#amount').val();

        var data = {
            source: source,
            date: date,
            amount: amount
        };

        $.ajax({
            type: 'POST',
            url: '{{ route('incomes.store') }}',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Income saved successfully',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });

                $('#addIncomeModal').modal('hide');
            },
            error: function(error) {
                Swal.fire('Error!', 'Something went wrong. Please try again later.', 'Error');
            }
        });

    }
</script>
