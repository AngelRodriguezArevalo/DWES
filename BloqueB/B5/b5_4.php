<?php
// Texto modificado con caracteres de distintos idiomas (chino, japonés, y emojis)
$text = 'Total: £444, 你好 (Hola en chino), こんにちは (Hola en japonés)';
?>

<p>
  <b>Character count using <code>strlen()</code>:</b>
  <?= strlen($text) ?><br>
  <b>Character count using <code>mb_strlen()</code>:</b>
  <?= mb_strlen($text, 'UTF-8') ?><br>
  <b>First match of 444 using <code>strpos()</code>:</b>
  <?= strpos($text, '444') ?><br>
  <b>First match of 444 using <code>mb_strpos()</code>:</b>
  <?= mb_strpos($text, '444', 0, 'UTF-8') ?><br>
</p>

