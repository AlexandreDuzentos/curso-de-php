<?php
class BankAccount
{
     private $accountNumber;
     private $accountType;
     public $accountOwner;
     public $accountBalance;
     public $accountStatus;
     
     //método construtor
     public function __construct(){
         $this->setAccountBalance(0.0);
         $this->setAccountStatus(false);
     }
     
     // métodos personalizados
     public function openAccount($accountType){
         $this->setAccountStatus(true);
         $this->setAccountType($accountType);
         
         if($this->getAccountType() == "ca"){  
             $this->setAccountBalance(50.00);
         } else if($this->getAccountType() == "sa") {
             $this->setAccountBalance(150.00);
         } else {
             echo "<p>Tipo de conta inexistente</p>";
         }
     }
     
     public function closeAccount(){
         if($this->getAccountBalance() > 0.0){
             echo "<p>Não é possível encerrar a conta ,
                   retire seus {$this->getAccountBalance()} reais antes</p>";
         } else if($this->getAccountBalance() < 0){
             echo "<p>Não é possivel encerrar a conta 
                   tem débito de {$this->getAccountBalance()}</p>";
         } else {
            $this->setAccountStatus(false);
            echo "<p>Conta encerrada com sucesso</p>";
         }  
     }
     
     public function deposit(float $amount){
         if($this->getAccountStatus() == true){
             $this->setAccountBalance($amount);
             var_dump($this);
         }
     }
   
     
     public function withDraw(float $amount){
         if($this->getAccountStatus() == true && $amount <= $this->getAccountBalance()){
                 $this->accountBalance -= $amount;
                 echo "<p>Saque efetuado com sucesso de {$amount} reais!</p>";
                 var_dump($this);
             } else {
                 $this->accountBalance -= $amount;
                echo "Saldo insuficente na sua conta, tens um débito de {$amount}"; 
                var_dump($this);
             }
     }
     
     
     public function monthlyPayment(){
         $payment = 0.0;
         if($this->getAccountType() == "ca"){
            $payment = 12;
         } else {
             $payment = 20;
         }
         
         if($this->getAccountStatus() == true){
             if($this->getAccountBalance() < $payment){
                 $this->accountBalance -= $payment;
             } else {
                 echo "<p>Saldo insuficente</p>";
             }  
         } else {
             echo "<p>Impossível pagar!</p>";
         }
         
     }
     
     // métodos setters e getters
     
     public function setAccountNumber($accountNumber){
         $this->$accountNumber = $accountNumber;
     }
     
     public function getAccountNumber(){
         return $this->accountNumber;
     }
     
     
     public function setAccountOwner($accountOwner){
         $this->accountOwner = $accountOwner;
     }
     
     public function getAccountOwner(){
         return $this->accountOwner;
     }
     
     public function setAccountType($accountType){
         $this->accountType = $accountType;
     }
     
     public function getAccountType(){
         return $this->accountType;
     }
     
     
     public function getAccountBalance(){
         return $this->accountBalance;
     }
     
     public function setAccountBalance($accountBalance){
         $this->accountBalance += $accountBalance;
     }
     
     
     public function getAccountStatus(){
         return $this->accountStatus;
     }
     
     public function setAccountStatus($accountStatus){
         $this->accountStatus = $accountStatus;
     }
     
    
}

