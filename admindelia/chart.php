<h2>Student Base on State</h2>

<div id="tabs">
    <ul>
        <?php for ($i = 1; $i <= 12; $i++) : ?>
            <li><a href="#tabs-<?php echo $i; ?>">Month <?php echo $i; ?></a></li>
        <?php endfor; ?>
    </ul>
    <?php for ($i = 1; $i <= 12; $i++) : ?>
        <div id="tabs-<?php echo $i; ?>">
            <canvas id="myChart<?php echo $i; ?>"></canvas>
        </div>
    <?php endfor; ?>
</div>