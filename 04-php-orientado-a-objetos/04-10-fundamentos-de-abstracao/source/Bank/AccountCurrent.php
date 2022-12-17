<?php

namespace Source\Bank;

use Source\Bank\Account;
use Source\App\User;
use Source\App\Trigger;

class AccountCurrent extends Account
{
  private $limit;

  public function __construct($branch, $account, User $client, $balance, $limit)
  {
     parent::__construct($branch, $account, $client, $balance);
     $this->limit = $limit;
  }

    public function deposit($value)
    {
      
      $this->balance += $value;
      Trigger::show("Depósito de {$this->toBrl($value)} efetuado com sucesso!", Trigger::ACCEPT);

    }

	final public function withdrawal($value)
	{
      if($value <= $this->balance + $this->limit){
         $this->balance -= abs($value);
         Trigger::show("Saque de {$this->toBrl($value)} efetuado com sucesso!");

         if($this->balance < 0){
            $tax = abs($this->balance) * 0.006;
            $this->balance -= $tax;
            Trigger::show("Taxa de uso limite: {$this->toBrl($tax)}",Trigger::ERROR); 
         }

      } else {
         $saving = $this->balance + $this->limit;
         Trigger::show("Saldo insuficiente, você tem {$this->toBrl($saving)}",Trigger::ERROR);
      }
}


}

?>