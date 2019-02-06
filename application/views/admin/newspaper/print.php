<style>
    .print{
        page-break-after:always;
    }
</style>
<?php foreach($newspaper as $each): ?>
    <div class="print">
    <?= $each->context?>
    </div>
<?php endforeach; ?>
<script>
    window.print();
</script>