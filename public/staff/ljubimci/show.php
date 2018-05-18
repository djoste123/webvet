<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sudije = Lista::find_by_id($id);
$lista = new Lista;
?>

<?php $page_title = 'Prikaži: ' . h($sudije->ime()); ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/ljubimci/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="bicycle show">

    <h3>Ljubimac: <?php echo h($sudije->ime()); ?></h3>

    <div class="attributes">
      <dl>
        <dt>Broj kartona</dt>
        <dd><?php echo h($sudije->id); ?></dd>
      </dl>
      <dl>
      <dl>
        <dt>Datum</dt>
        <dd><?php echo h($lista->euro_date($sudije->date)); ?></dd>
      </dl>
      <dl>
        <dl>
        <dt>Ime ljubimca</dt>
        <dd><?php echo h($sudije->ime_pet); ?></dd>
      </dl>
        <dl>
        <dt>Vrsta</dt>
        <dd><?php echo h($sudije->vrsta); ?></dd>
      </dl>
          <dl>
        <dt>Rasa</dt>
        <dd><?php echo h($sudije->rasa); ?></dd>
      </dl>
      <dl>
          <dl>
        <dt>Broj čipa</dt>
        <dd><?php echo h($sudije->br_cipa); ?></dd>
      </dl>
          <dl>
        <dt>Broj pasoša</dt>
        <dd><?php echo h($sudije->br_pasosa); ?></dd>
      </dl>
          <dt>Broj potvrde</dt>
        <dd><?php echo h($sudije->br_potvrde); ?></dd>
      </dl>
          <dl>
        <dt>Opis</dt>
        <dd><?php echo h($sudije->description); ?></dd>
      </dl>
          <h4>Podaci vlasnika</h4>
      <dl>
        <dt>Ime</dt>
        <dd><?php echo h($sudije->ime); ?></dd>
      </dl>
      <dl>
        <dt>Prezime</dt>
        <dd><?php echo h($sudije->prezime); ?></dd>
      </dl>
      <dl>
        <dt>JMBG</dt>
        <dd><?php echo h($sudije->jmbg); ?></dd>
      </dl>
      <dl>
        <dt>Broj telefona</dt>
        <dd><?php echo h($sudije->br_tel); ?></dd>
      </dl>
          <dl>
        <dt>E-mail</dt>
        <dd><?php echo h($sudije->email); ?></dd>
      </dl>
      <dl>
        <dt>Adresa</dt>
        <dd><?php echo h($sudije->adresa); ?></dd>
      </dl>
    </div>
    <?php
    $sql = "SELECT * FROM pregled WHERE br_kartona={$sudije->id} ORDER BY date DESC";
    $pregledi = Pregled::find_by_sql($sql);
    ?>
    <div id="content">
  <div class="admins listing">
    <h3>Pregledi</h3>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/pregled/new.php'); ?>">Dodajte pregled</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Broj kartona</th>
        <th>Cena</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($pregledi as $pregled) { ?>
        <tr>
          <td><?php echo h($pregled->id); ?></td>
          <td><?php echo h($pregled->euro_date($pregled->date)); ?></td>
          <td><?php echo h($pregled->br_kartona); ?></td>
          <td><?php echo h($pregled->cena); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/show.php?id=' . h(u($pregled->id))); ?>">Detalji</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/edit.php?id=' . h(u($pregled->id))); ?>">Promeni</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/delete.php?id=' . h(u($pregled->id))); ?>">Izbriši</a></td>
    	  </tr>
      <?php } ?>

  </div>

</div>
