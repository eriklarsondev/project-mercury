<?php get_header(); ?>

<div class="flex items-center mb-5">
    <div class="flex-1">
        <span class="relative uppercase tracking-widest font-normal text-sm before:absolute before:content-[''] md:before:bottom-[calc(100%_+_5rem)] before:bottom-[calc(100%_+_30px)] before:right-[2px] before:w-[2px] before:h-screen before:bg-slate-700 before:rounded-full">
            Mercury Theme
        </span>
    </div>

    <div>
        <span class="px-5 py-2 tracking-widest font-medium text-xs text-accent border-2 border-accent rounded-full">v0.1.0</span>
    </div>
</div>

<h1 class="relative mb-1 before:absolute before:content-[''] before:top-[calc(50%_-_1px)] md:before:right-[calc(100%_+_5rem)] before:right-[calc(100%_+_15px)] before:w-screen before:h-[2px] before:bg-slate-700 before:rounded-full">
    <?php bloginfo('name'); ?>
</h1>
<?php if (get_bloginfo('description')): ?>
    <span class="block leading-7"><?php bloginfo('description'); ?></span>
<?php else: ?>
    <span class="block">&mdash;</span>
<?php endif; ?>

<div class="flex items-center mt-8">
    <div class="flex-1">
        <a href="<?php echo '#'; ?>"
           target="_blank"
           class="uppercase tracking-widest font-normal text-sm text-accent"><i class="fas fa-arrow-up-right-from-square"></i> View Website</a>
    </div>

    <div class="md:block hidden">
        <a href="https://github.com/eriklarsondev/project-mercury"
           target="_blank"
           class="uppercase tracking-widest font-normal text-sm text-slate-600"><i class="fab fa-github"></i> Documentation</a>
    </div>
</div>

<?php get_footer(); ?>
