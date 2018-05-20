<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$pregled = Pregled::find_by_id($id);

include ('../../../private/sql_query.php');  

?>

<?php $page_title = 'Pregled: ' . h($pregled->id); ?>

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
