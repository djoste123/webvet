<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($sudija)) {
  redirect_to(url_for('/staff/ljubimci/index.php'));
}
?>
<?php require_once('../../../private/shared/JQ_header.php'); ?>
<dl>
  <dt>Datum</dt>
  <dd><input type="text" id="datepicker" name="sudija[date]" value="<?php echo h($sudija->date) ?>" /></dd>
</dl>
<p>Podaci ljubimca</p>
<dl>
  <dt>Ime ljubimca</dt>
  <dd><input type="text" name="sudija[ime_pet]" value="<?php echo h($sudija->ime_pet) ?>" /></dd>
</dl>
    <dl>
  <dt>Vrsta</dt>
  <dd>
    <select name="sudija[vrsta]">
      <option value=""></option>
    <?php foreach(Lista::VRSTA as $vrsta) { ?>
      <option value="<?php echo $vrsta; ?>"<?php if($sudija->vrsta == $vrsta) { echo 'selected'; } ?>><?php echo $vrsta; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>
<dl>
  <dt>Rasa</dt>
  <dd><input type="text" name="sudija[rasa]" value="<?php echo h($sudija->rasa) ?>" /></dd>
</dl>

<dl>
  <dt>Pol</dt>
  <dd>
    <select name="sudija[pol]">
      <option value=""></option>
    <?php foreach(Lista::POL as $pol_id => $pol_name) { ?>
      <option value="<?php echo $pol_id; ?>"<?php if($sudija->pol == $pol_id) { echo 'selected'; } ?>><?php echo $pol_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>
<dl>
  <dt>Broj čipa</dt>
  <dd><input type="text" name="sudija[br_cipa]" value="<?php echo h($sudija->br_cipa) ?>" /></dd>
</dl>
<dl>
  <dt>Broj pasoša</dt>
  <dd><input type="text" name="sudija[br_pasosa]" value="<?php echo h($sudija->br_pasosa) ?>" /></dd>
</dl>
<dl>
  <dt>Opis</dt>
  <dd><textarea name="sudija[description]" rows="3" cols="60"><?php echo h($sudija->description) ?></textarea></dd>
</dl>    
    <p>Podaci vlasnika</p>

<dl>
  <dt>Ime</dt>
  <dd><input type="text" name="sudija[ime]" value="<?php echo h($sudija->ime) ?>" /></dd>
</dl>

<dl>
  <dt>Prezime</dt>
  <dd><input type="text" name="sudija[prezime]" value="<?php echo h($sudija->prezime) ?>" /></dd>
</dl>

<dl>
  <dt>JMBG</dt>
  <dd>
    <dd><input type="text" name="sudija[jmbg]" value="<?php echo h($sudija->jmbg) ?>" /></dd>
  </dd>
</dl>

<dl>
  <dt>Broj telefona</dt>
  <dd>
    <dd><input type="text" name="sudija[br_tel]" value="<?php echo h($sudija->br_tel) ?>" /></dd>
  </dd>
</dl>
<dl>
  <dt>Email</dt>
  <dd> <input type="text" name="sudija[email]" value="<?php echo h($sudija->email) ?>" /></dd>
</dl>    
<dl>
  <dt>Adresa</dt>
  <dd> <input type="text" name="sudija[adresa]" value="<?php echo h($sudija->adresa) ?>" /></dd>
</dl>







