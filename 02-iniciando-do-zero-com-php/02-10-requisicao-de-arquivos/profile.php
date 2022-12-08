<article style="padding:5px 20px;backgorund:#eeeeee;
 -webkit-border-radius:4px;
 moz-border-radius:4px;
 border-radius:4px">
<h1><?= $profile->name ?></h1>
<p>Trabalha na <?= $profile->company;?><br>
   <a title='Enviar email' href="mailto:<?= $profile->email; ?>">Enviar email</a>
</p>
</article>