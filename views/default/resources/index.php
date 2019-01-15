<head>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <?php echo_css('index.css'); ?>
  <?php echo_Css('general.css'); ?>
</head>

<div id="header">
  <div id="title">
    <h1>Üldpädevused</h1>
  </div><!--
    this is here to get rid of the whitespace between the two divs
  --><div id="teacher">
    <?php echo_url('uldpadevused:teacher', 'polls:main:teacher'); ?>
  </div>
</div>

<div id="content">
  <div id="image">
    <?php echo_img('statue.jpg'); ?>
  </div>
  <div id="link">
    <?php echo_start_url('uldpadevused:begin'); ?>
      <div id="click">
        <?php echo_caption('polls:main:start'); ?>
      </div>
    <?php echo_end_url(); ?>
  </div>
</div>