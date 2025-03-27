<?php
// Ensure this block is rendered only on a post of the correct custom post type (e.g., 'job')
if( get_post_type() === 'thrive-jobs' ) :
    // Get the ACF fields for the current job post
    $post_id = get_the_ID();
    $job_start_date = get_field('job_start_date',$post_id);
    $salary = get_field('salary',$post_id);
    $description = get_field('description',$post_id);
    $requirements = get_field('requirements',$post_id); // This could be a repeater or a text field
    
?>
    <div class="job-details-block">
        <div class="job-details-header">
            <h2 class="job-title"><?php the_title(); ?></h2>
        </div>
        
        <?php if( $job_start_date ): ?>
            <div class="job-start-date">
                <strong>Start Date:</strong> <?php echo esc_html( $job_start_date ); ?>
            </div>
        <?php endif; ?>
        
        <?php if( $salary ): ?>
            <div class="job-salary">
                <strong>Salary:</strong> <?php echo esc_html( $salary ); ?>
            </div>
        <?php endif; ?>
        
        <?php if( $description ): ?>
            <div class="job-description">
                <strong>Description:</strong>
                <p><?php echo esc_html( $description ); ?></p>
            </div>
        <?php endif; ?>
        
        <?php if( $requirements ): ?>
            <div class="job-requirements">
                <strong>Requirements:</strong>
                <?php 
                if( $requirements): // Check if it's a repeater or multiple values
                    echo $requirements;
                endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
