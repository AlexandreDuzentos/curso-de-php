<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

use \Source\Related\Company;

$company = new Company();
$company->bootCompany("Upinside","Nome da rua");
var_dump($company);

$company->boot("UpInside",new \Source\Related\Address("Dr Antônio Luíz moura gonszaga",3399,"Bloco A, Sala 210"));

var_dump($company);

echo "A {$company->getCompany()} tem sede na rua {$company->getAddress()->getStreet()}";




/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsphp = new \Source\Related\Product("Full Stack PHP", 1997);
$laradev = new \Source\Related\Product("Laravel developer", 977);

$company->addProduct($fsphp);
$company->addProduct($laradev);

var_dump($company->getProducts());

foreach($company->getProducts() as $product) {
   echo "<p>{$product->getName()} por {$product->getPrice()}</p>";
}


/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("CEO","Robson","Leite");
$company->addTeamMember("Programador chefe","Alexandre","Duzentos");
$company->addTeamMember("Manager","Kaue","Cardoso");
$company->addTeamMember("Suporte","Gah","Morandi");

var_dump($company);

foreach($company->getTeam() as $member){
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}










