<?php


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require '../src/start.php';

if(isset($_GET['approved'])){

    $approved = $_GET['approved'] === 'true';

    if($approved){

        $payerId = $_GET['PayerID'];

        $paymentId = $db->prepare("
        SELECT payment_id
        FROM transactions_paypal
        WHERE hash = :hash
        ");

        $paymentId->execute([
            'hash' => $_SESSION['paypal_hash']
        ]);

        $paymentId = $paymentId->fetchObject()->payment_id;

        $payment = Payment::get($paymentId, $api);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $payment->execute($execution, $api);

        $updateTransaction = $db->prepare("
        UPDATE transactions_paypal
        SET complete = 1
        WHERE payment_id = :payment_id
        ");

        $updateTransaction->execute([
            'payment_id' => $paymentId
        ]);

        $setMember = $db->prepare("
            UPDATE users
            SET member = 1
            WHERE is = :user_id
        ");

        $setMember->execute([
           'user_id' => $_SESSION['user_id']
        ]);

        unset($_SESSION['paypal_hash']);

        header('Location: ../member/complete.php');


    }
    else{
        header('Location: ../paypal/canceled.php');
    }

}