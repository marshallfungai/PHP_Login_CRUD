<?php
/**
 * Member View Template
 */
//  (directly accessed):
define('_ACCESS_ALLOWED', 1);

include_once 'sections/header.php';
require_once  'inc/subscriber.inc.php'; //User Capabilities

$userExecute = new Subscriber(); //initiate user methods


$a_paymentData = $userExecute->readDatabasePayments();

?>

    <h2>Agent</h2>
    <h4>Welcome, <?php echo $_SESSION['a_USER']['fullname'] ?>.</h4>
    <hr>
    <div class="container">
        <table id="paymentsList" class="table table-dark ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Packages</th>
                <th scope="col">Status</th>
                <th scope="col">Date Paid</th>
                <th scope="col">Customer id</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            <?php
            //display data
            foreach ($a_paymentData as $data): ?>
                <tr class="pay_listing" id="pay_node-<?php echo $data['id'];?>" >
                    <th scope="row" data-paymentID="<?php echo $data['id'];  ?>"><?php echo $data['id'];  ?></th>
                    <td data-packages="<?php echo $data['Package']; ?>"><?php echo $data['Package']; ?></td>
                    <td data-status="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></td>
                    <td data-date="<?php echo $data['date']; ?>"><?php echo $data['date']; ?> </td>
                    <td data-user="<?php echo $data['customer']; ?>"><?php echo $data['customer']; ?> </td>

                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>

<?php
include_once 'sections/dataedit.php';
include_once 'sections/footer.php';
?>