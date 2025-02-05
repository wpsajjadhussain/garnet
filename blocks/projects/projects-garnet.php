<?php 
/**
 * projects block
 * 
 * @return void
 */


if ( ! defined( 'ABSPATH' ) ) {     

    exit;
    
}

// acf fields title, button link, repeater card within image , content, author

$title = get_field('title');
$button_link = get_field('button_link');
$cards = get_field('card');
// if (empty($title) && empty($button_link) && empty($cards)) {
//     return;
// }


?>



<section class="projects">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 project__heading">
                <h3><?php echo $title; ?></h3>
                <a class="btn primary-btn" href="<?php echo $button_link['url']; ?>">
                    <?php echo $button_link['title']; ?>
                </a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($cards as $card): ?>
                <div class="col-lg-6">
                    <div class="project__card">
                        <img src="<?php echo $card['image']['url']; ?>" alt="<?php echo $card['image']['alt']; ?>">
                        <div class="project__card-content">
                            <?php echo $card['content']; ?>
                            <p><?php echo $card['authors']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- styling -->
<style>
    .project__heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.4rem;
    }

    .project__card {
        border: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        
    }

    .project__card-content {
        padding: 1.6rem;
        background-color: #FEF8E6;
        max-width: 100%;
    }
</style>

