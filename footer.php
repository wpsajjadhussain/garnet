<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package garnet
 */

?>
<?php
$column_one = get_field('column_one', 'options');
$column_two = get_field('column_two', 'options');
$column_three = get_field('column_three', 'options');
$footer_mneu = get_field('footer_mneu', 'options');
$powered_by = get_field('powered_by', 'options');
$copyright = get_field('copyright', 'options');
$column_four = get_field('column_four', 'options');
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row justify-content-between toprow">
            <div class="col-lg-2">
                <div class="content location">
                    <?php echo $column_one; ?>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="logoFooter text-center">
                    <?php echo $column_two; ?>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="content social-icons">
                    <?php echo $column_three; ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center middlerow">
            <div class="col-lg-8 col-md-12">
                <div class="middle-content">
                    <?php echo $column_four; ?>
                </div>
            </div>
        </div>
        <div class="row bottom-row">
            <div class="col-lg-3">
                <div class="--copyright d-flex align-items-center gap-2">
                    <p>&copy; <?php echo date('Y'); ?></p> <?= $copyright; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="--menufooter text-center">
                    <?php echo $footer_mneu; ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="--powered text-end">
                    <?php echo $powered_by; ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</main>

<?php wp_footer(); ?>

</body>

</html>