<?php get_header(); ?>

<div class="flex items-center mb-5">
    <div class="flex-1">
        <span class="uppercase tracking-widest font-normal text-sm">Mercury Theme</span>
    </div>

    <div>
        <span class="px-5 py-2 tracking-widest font-medium text-xs text-accent border-2 border-accent rounded-full">v0.1.0</span>
    </div>
</div>

<h1 class="mb-1"><?php bloginfo('name'); ?></h1>
<?php if (get_bloginfo('description')): ?>
    <span class="block leading-7"><?php bloginfo('description'); ?></span>
<?php else: ?>
    <span class="block">&mdash;</span>
<?php endif; ?>

<div class="flex items-center mt-8">
    <div class="flex-1">
        <a href="<?php echo '#'; ?>"
           target="_blank"
           class="tracking-widest font-normal text-accent">View Website</a>
    </div>

    <div>
        <a href="https://github.com/eriklarsondev/project-mercury"
           target="_blank"
           class="tracking-widest font-normal"><i class="fab fa-github"></i> Documentation</a>
    </div>
</div>

<?php get_footer(); ?>
