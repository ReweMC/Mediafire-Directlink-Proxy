<?php
if (!function_exists('getUrlMimeType')) {
  function getUrlMimeType($url) {
    $buffer = file_get_contents($url);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return $finfo->buffer($buffer);
  }
}
$url = $_GET["file"];
$download = $_GET["dl"];
if ($url == null) {
  header("Content-type: text/plain");
  echo "Keine Datei angegeben.";
} else {
  if (preg_match("/http(s)?:\/\/(www\.)?mediafire.com\/file(_premium)?\//i", $url)) {
    $content = file_get_contents($url);
    preg_match('/http(s?):\/\/download[0-9]+\.mediafire\.com[^"]+/i', $content, $matches);
    if ($download == true) {
      header("Location: $matches[0]");
    } else {
      $filetype = getUrlMimeType($matches[0]);
      header("Content-type: $filetype");
      echo file_get_contents($matches[0]);
    }
  } else {
    header("Content-type: text/plain");
    echo "Kein Mediafire-Dateilink.";
  }
}
?>
