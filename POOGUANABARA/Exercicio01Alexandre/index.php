<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>EXERCÍCIO - CLASSE BankAccount</title>
</head>
<body>
   <?php  
     require_once  __DIR__."/BankAccount.php";
     $BankAccount = new BankAccount();
     $BankAccount->openAccount("ca");
     $BankAccount->deposit(500.00);
     $BankAccount->withDraw(50.00);
     $BankAccount->withDraw(500.00);
     $BankAccount->withDraw(10.00);
     $BankAccount->deposit(5000);
     $BankAccount->withDraw(4990);
     $BankAccount->closeAccount();
    
   ?>
</body>
</html>
