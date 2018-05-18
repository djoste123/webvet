<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($pregled)) {
  redirect_to(url_for('/staff/pregled/index.php'));
}
?>
<?php require_once('../../../private/shared/JQ_header.php'); ?>
<dl>
  <dt>Datum</dt>
  <dd><input type="text" id="datepicker" name="pregled[date]" value="<?php echo h($pregled->date); ?>" /></dd>
</dl>

<dl>
  <dt>Broj kartona</dt>
  <dd><input type="text" name="pregled[br_kartona]" value="<?php echo h($pregled->br_kartona); ?>" /></dd>
</dl>

<dl>
  <dt>Anamneza</dt>
  <dd><textarea name="pregled[anamneza]" rows="4" cols="60"><?php echo h($pregled->anamneza) ?></textarea></dd>
</dl>

<dl>
  <dt>Dijagnoza</dt>
  <dd><textarea name="pregled[dijagnoza]" rows="4" cols="60"><?php echo h($pregled->dijagnoza) ?></textarea></dd>
</dl>

<dl>
  <dt>Terapija</dt>
  <dd><textarea name="pregled[terapija]" rows="4" cols="60"><?php echo h($pregled->terapija) ?></textarea></dd>
</dl>

<dl>
  <dt>Cena</dt>
  <dd><input type="text" name="pregled[cena]" value="<?php echo h($pregled->cena); ?>" /></dd>
</dl>
