
// A $( document ).ready() block.
$( document ).ready(function() {


    /*
     START: Edit PAYMENT DATA Form
     */
    document.addEventListener('click', function(e) {

        //Get dynamic data from table to fill edit form
        let rowId = e.target.dataset.edit;
        let payNode = document.querySelectorAll('#pay_node-'+rowId+' td'); //Row

        let payID = document.querySelectorAll('#pay_node-'+rowId+' th')[0]; //payment id

        let editPackage = payNode[0].dataset.packages;
        let editStatus = payNode[1].dataset.status;
        let editDate = payNode[2].dataset.date;
        let editUser = payNode[3].dataset.user;
        let paymentID = payID.dataset.paymentid;

        //ID Values to submit
        document.querySelector('#edit_paymentID').value = paymentID;
        document.querySelector('#edit_customer').value = editUser;



        //Add placeholders to EDit form
        document.querySelector('#edit_packages').placeholder= editPackage ;
        document.querySelector('#edit_customer').placeholder= editUser;
        document.querySelector('#edit_status').placeholder= editStatus;
        document.querySelector('#edit_date').placeholder= editDate;

        //Add default values
        document.querySelector('#edit_packages').defaultValue= editPackage ;

    });
    



    /*
     END: Edit PAYMENT DATA Form
     */
});

