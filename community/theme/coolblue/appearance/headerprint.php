<?php
  header('Content-Type: text/html; charset='.$this->get_charset());
?>
<!DOCTYPE html>

<html>
<head>
  <title><?php echo htmlspecialchars($this->config['site_name'], ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET)." : ".(isset($this->page['title']) ? $this->page['title'] : $this->tag); ?></title>
<?php // do not index alternative print pages
  echo "<meta name=\"robots\" content=\"noindex, nofollow\" />\n";?>
  <meta charset="<?php echo $this->get_charset(); ?>" />
  <meta name="keywords" content="<?php echo $this->config['meta_keywords'] ?>" />
  <meta name="description" content="<?php echo $this->config['meta_description'] ?>" />
  <link rel="stylesheet" href="<?php echo $this->config['theme_url'] ?>css/print.css" />
</head>

<body>

<div class="header">
  <h1>
  <?php echo file_exists("images/".$this->config['site_name'].".png")?"<img src='/images/".$this->config['site_name'].".png' alt='".$this->config['site_name']."' />":$this->config['site_name'] ?> : <?php echo isset($this->page['title']) ? $this->page['title'] : $this->tag; ?>
  </h1>
</div>
