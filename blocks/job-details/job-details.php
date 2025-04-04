<?php

if( get_post_type() === 'thrive-jobs' ) :

    $post_id = get_the_ID();
    $job_start_date = get_field('job_start_date',$post_id);
    $job_contact = get_field('contact_person',$post_id);
    $salary = get_field('salary',$post_id);
    $description = get_field('description',$post_id);
    $requirements = get_field('requirements',$post_id); 
    $job_id = get_field('job_id', $post_id);
    
?>
    <div class="job-details-block">
        <div class="job-details-header">
            <h2 class="job-title"><?php the_title(); ?></h2>
        </div>
        
        <?php if( $job_id ): ?>
            <div class="job-id">
                <strong>Job ID:</strong> <?php echo esc_html( $job_id ); ?>
            </div>
        <?php endif; ?>
        <?php if( $job_start_date ): ?>
            <div class="job-start-date">
                <strong>Start Date:</strong> <?php echo esc_html( $job_start_date ); ?>
            </div>
        <?php endif; ?>
        <?php if( $job_contact ): ?>
            <div class="job-contact">
                <strong>Contact Email:</strong> <?php echo esc_html( $job_contact ); ?>
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
                    echo $requirements;
                ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
