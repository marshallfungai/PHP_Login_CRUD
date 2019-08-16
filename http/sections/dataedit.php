
<div class="modal" tabindex="-1" role="dialog" id="editData" aria-labelledby="editData" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPaymentsForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?action=edit");?>" method="POST" >
                    <div class="form-group">
                        <input type="text" class="form-control" value=" " name="edit_customer" id="edit_customer" placeholder="Customer ID" readonly="readonly" >
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="edit_packages" id="edit_packages" placeholder="Packages">
                    </div>

                    <div class="form-group">

                        <!--<input type="text" class="form-control" name="edit_status" id="edit_status" placeholder="Status">-->
                        <select class="form-control" name="edit_status" id="edit_status" >
                            <option>Paid</option>
                            <option>Unpaid</option>

                        </select>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" name="edit_date" id="edit_date" placeholder="Date Paid" readonly="readonly">
                    </div>
                    <input type="hidden" class="form-control" name="edit_paymentID" id="edit_paymentID">
                    <button type="submit" class="btn btn-success">Save</button>

                </form>
            </div>

        </div>
    </div>
</div>
<script>


</script>
