<?php 
  // Create id attribute allowing for custom "anchor" value.
  $id = 'block-' . $block['normal-content'];
  if( !empty($block['anchor']) ) {
      $id = $block['anchor'];
  }

  // Create class attribute allowing for custom "className" and "align" values.
  $className = 'block';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }
  $main_column_size = 'col-md-' . get_field('column_size');
  $backgroundType = get_field('block_background');
  $backgroundColor = get_field('block_background_color');
  $backgroundImage = get_field('block_background_image');
  $paddingY = get_field('padding_y');
  $content =  '<div class="content-styled">' . get_field('content') . '</div>';
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="padding-top: <?php echo $paddingY; ?> ; padding-bottom : <?php echo $paddingY; ?>; background : <?php if($backgroundType == 'color') { echo $backgroundColor; } elseif($backgroundType == 'image') { echo 'url(' . $backgroundImage . ')'; } ?>">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($main_column_size); ?>">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
</section>
