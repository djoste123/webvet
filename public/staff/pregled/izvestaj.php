<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>

<?php 
if(!$session->is_logged_in()){
    redirect_to(url_for('/staff/login.php'));
}else{
    //Do nothing
}
?>

<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 8;
$total_count = Pregled::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

$sql = "SELECT * FROM pregled ";
$sql .= "ORDER by date DESC ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";

$pregledi = Pregled::find_by_sql($sql);

?>
<?php $page_title = 'Pregled'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="admins listing">
    <h1>Izveštaj</h1>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Broj kartona</th>
        <th>Anamneza</th>
        <th>Cena</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
<?php
$searchq = "";
$searchq1 = "";
$searchq2 = "";
$pregledi = [];


if(isset($_POST['search1'])&& isset($_POST['search2'])){
$searchq1 = $_POST['search1'];
$searchq1 = preg_replace("#[^0-9a-z]#i", "", $searchq1);
$searchq2 = $_POST['search2'];
$searchq2 = preg_replace("#[^0-9a-z]#i", "", $searchq2);

$sql = "SELECT * FROM pregled WHERE date ";
$sql .= "between '$searchq1'";
$sql .= " AND '$searchq2'";
$sql .= " ORDER by date DESC";

    $pregledi = Pregled::find_by_sql($sql);
}
?>
      <?php foreach($pregledi as $pregled) { ?>
        <tr>
          <td><?php echo h($pregled->id); ?></td>
          <td><?php echo h($pregled->euro_date($pregled->date)); ?></td>
          <td><?php echo h($pregled->br_kartona); ?></td>
          <td><?php echo h($pregled->anamneza); ?></td>
          <td><?php echo h($pregled->sum().".00"); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/show.php?id=' . h(u($pregled->id))); ?>">Detalji</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/edit.php?id=' . h(u($pregled->id))); ?>">Promeni</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pregled/delete.php?id=' . h(u($pregled->id))); ?>">Izbriši</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <div>
    <p>Izveštaj u vremenskom periodu</p>
    <form action="../pregled/izvestaj.php" method="post">
        <input type="text" name="search1" placeholder="Od datuma" />
        <input type="text" name="search2" placeholder="Do datuma" />
        <input type="submit" value="Potvrdi" />
    </form>
    </div>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
