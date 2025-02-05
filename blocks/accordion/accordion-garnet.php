<?php 
// block render template

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Color Card Block Template
 * 
 * @param array $attributes The block attributes.
 * 
 * @return string The block HTML.
 */

//  acf fields for the block Color Card - Garnet:

// get feilds from the repeater fields title and content

$accordion = get_field('accordion');

if( $accordion ): ?> 
    <div class="accordion" id="accordionExample">
        <?php foreach( $accordion as $index => $accordion_item ): 
            // Generate a unique ID using the index
            $unique_id = 'accordion-' . $index;
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-<?php echo $unique_id; ?>">
                <button class="accordion-button <?php echo $index === 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $unique_id; ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $unique_id; ?>">
                    <?php echo $accordion_item['title']; ?>
                </button>
            </h2>
            <div id="collapse-<?php echo $unique_id; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="heading-<?php echo $unique_id; ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php echo $accordion_item['content']; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
