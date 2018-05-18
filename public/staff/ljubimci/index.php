<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>
<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 8;
$total_count = Lista::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// Find all sudije;
// use pagination instead


$sql = "SELECT * FROM lista ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$sudije = Lista::find_by_sql($sql);

?>
<!--
    
-->
<?php $page_title = 'Lista ljubimaca'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Lista ljubimaca</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/ljubimci/new.php'); ?>">Dodaj ljubimca</a>
    </div>

  	<table class="list">
      <tr>
        <th>Br. kartona</th>
        <th>Ime ljubimca</th>
        <th>Vrsta</th>
        <th>Rasa</th>
        <th>Pol</th>
        <th>Br. čipa</th>
        <th>Ime vlasnika</th>
        <th>Prezime</th>
        <th>Br. telefona</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($sudije as $sudija) { ?>
        <tr>
          <td><?php echo h($sudija->id); ?></td>
          <td><?php echo h($sudija->ime_pet); ?></td>
          <td><?php echo h($sudija->vrsta); ?></td>
          <td><?php echo h($sudija->rasa); ?></td>
          <td><?php echo h($sudija->pol()); ?></td>
          <td><?php echo h($sudija->br_cipa); ?></td>
          <td><?php echo h($sudija->ime); ?></td>
          <td><?php echo h($sudija->prezime); ?></td>
          <td><?php echo h($sudija->br_tel); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/ljubimci/show.php?id=' . h(u($sudija->id))); ?>">Detalji</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/ljubimci/edit.php?id=' . h(u($sudija->id))); ?>">Promeni</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/ljubimci/delete.php?id=' . h(u($sudija->id))); ?>">Izbriši</a></td>
    	  </tr>
      <?php } ?>
  	</table>
<?php
$url = url_for('/staff/ljubimci/index.php');
echo $pagination->page_links($url);
?>
    
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
