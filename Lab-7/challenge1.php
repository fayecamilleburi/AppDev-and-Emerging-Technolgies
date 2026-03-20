<?php

class BankTransaction
{
    public $bank_name;
    public $transaction;
    private $account_no;
    private $amount;
    private $savings_amount = 10000;

    public function __construct($bank_name, $transaction, $account_no, $amount)
    {
        $this->bank_name = $bank_name;
        $this->transaction = $transaction;
        $this->account_no = $account_no;
        $this->amount = $amount;
    }

    public function getInfo()
    {
        echo 'Bank Name: '. $this->bank_name. '<br>';
        echo 'Customer Account No: '. $this->account_no. '<br>';
        echo 'Type of Transaction: '. $this->transaction. '<br>';
        echo 'Current Balance: '. $this->savings_amount. '<br>';
        echo 'Amount: '. $this->amount. '<br>';
    }

    public function newBalance() 
    {
        if($this->transaction == 'D') {
            echo 'New Balance: '. $this->savings_amount + $this->amount . '<br>';
        } elseif($this->transaction == 'W') {
            if($this->savings_amount < $this->amount) {
                echo 'Insufficient funds! <br>';
                return;
            }
            echo 'New Balance: '. $this->savings_amount - $this->amount . '<br>';
        } else {
            echo 'Unable to process this transaction! Invalid Transaction type! <br>';
            return;   
        }
    }
}

echo 'Object: customer1 <br><br>';
$customer1 = new BankTransaction('BDO', 'W', 'ACNO0000001', 3000);
$customer1->getInfo();
$customer1->newBalance();

echo '<br>';

echo 'Object customer2 <br><br>';
$customer2 = new BankTransaction('BPI', 'D', 'ACNO0000002', 3000);
$customer2->getInfo();
$customer2->newBalance();

echo '<br>';

echo 'Object customer3 <br><br>';
$customer3 = new BankTransaction('METROBANK', 'AB', 'ACNO0000003', 3000);
$customer3->getInfo();
$customer3->newBalance();
