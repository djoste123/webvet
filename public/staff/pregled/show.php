<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$pregled = Pregled::find_by_id($id);

include ('../../../private/sql_query.php');  
/*
$sql = "SELECT ime_pet FROM lista where id=" . $pregled->br_kartona;
$lista = Lista::find_by_sql($sql);
$sql2 = "SELECT ime FROM lista where id=" . $pregled->br_kartona;
$lista2 = Lista::find_by_sql($sql2);
$sql3 = "SELECT prezime FROM lista where id=" . $pregled->br_kartona;
$lista3 = Lista::find_by_sql($sql3);
$sql4 = "SELECT br_tel FROM lista where id=" . $pregled->br_kartona;
$lista4 = Lista::find_by_sql($sql4);
$sql5 = "SELECT adresa FROM lista where id=" . $pregled->br_kartona;
$lista5 = Lista::find_by_sql($sql5);
 */
?>

<?php $page_title = 'Pregled: ' . h($pregled->id); ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pregled/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="admin show">

    <h1>Pregled: <?php echo h($pregled->id); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Datum</dt>
        <dd><?php echo h($pregled->euro_date($pregled->date)); ?></dd>
      </dl>
      <dl>
        <dt>Broj kartona</dt>
        <dd><?php echo h($pregled->br_kartona); ?></dd>
      </dl>
      <dl>
        <dt>Anamneza</dt>
        <dd><?php echo h($pregled->anamneza); ?></dd>
      </dl>
      <dl>
        <dt>Dijagnoza</dt>
        <dd><?php echo h($pregled->dijagnoza); ?></dd>
      </dl>
        <dl>
        <dt>Terapija</dt>
        <dd><?php echo h($pregled->terapija); ?></dd>
      </dl>
        <dl>
        <dt>Cena</dt>
        <dd><?php echo h($pregled->cena); ?></dd>
      </dl>
        <?php foreach($lista as $liste) { ?>
        <dl>
        <dt>Ime ljubimca</dt>
        <dd><?php echo h($liste->ime_pet); ?></dd>
      </dl>
        <h3>Podaci o vlasniku</h3>
      <?php } ?>
        <?php foreach($lista2 as $liste) { ?>
        <dl>
        <dt>Ime</dt>
        <dd><?php echo h($liste->ime); ?></dd>
      </dl>
      <?php } ?>
        <?php foreach($lista3 as $liste) { ?>
        <dl>
        <dt>Prezime</dt>
        <dd><?php echo h($liste->prezime); ?></dd>
      </dl>
      <?php } ?>
        <?php foreach($lista5 as $liste) { ?>
        <dl>
        <dt>Adresa</dt>
        <dd><?php echo h($liste->adresa); ?></dd>
      </dl>
      <?php } ?>
        <?php foreach($lista4 as $liste) { ?>
        <dl>
        <dt>Broj telefona</dt>
        <dd><?php echo h($liste->br_tel); ?></dd>
      </dl>
      <?php } ?>
    </div>

  </div>

</div>
