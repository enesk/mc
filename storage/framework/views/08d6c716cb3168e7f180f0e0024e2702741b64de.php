<div class="col-xs-12 career_table">
    <div class="careerTable">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Stellenbezeichnung</th>
                <th>Standort</th>
                <th>Unternehmensbereich</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($jobs as $job): ?>
            <tr data-href="<?php echo e(route('jobs.show', $job->id)); ?>" class="toDetail">
                <td><?php echo e($job->title); ?></td>
                <td><?php echo e($job->station->city); ?></td>
                <td><?php echo e($job->category->title); ?><i aria-hidden="true" class="fa fa-angle-right"></i></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>