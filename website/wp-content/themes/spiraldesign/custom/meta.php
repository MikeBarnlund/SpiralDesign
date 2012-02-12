<div class="my_meta_control">

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras orci lorem, bibendum in pharetra ac, luctus ut mauris. Phasellus dapibus elit et justo malesuada eget <code>functions.php</code>.</p>

    <label>Grid Priority</label>

    <p>
        <input type="text" name="_gridpriority" value="<?php if(!empty($gridpriority)) echo $gridpriority; ?>"/>
        <span>Enter in a number</span>
    </p>

    <label>Animation</label>

    <p>
        <input type="text" name="_my_meta[animation]" value="<?php if(!empty($meta['animation'])) echo $meta['animation']; ?>"/>
        <span>Animation Classname. (anim-hflip, anim-vflip, anim-fade)</span>
    </p>

    <label>Cell Class</label>

    <p>
        <input type="text" name="_my_meta[cellclass]" value="<?php if(!empty($meta['cellclass'])) echo $meta['cellclass']; ?>"/>
        <span>Class name to style the cell itself. ('dbl' = span 2 cells, 'permanent-page', 'blog-post', 'work-example' )</span>
    </p>

</div>