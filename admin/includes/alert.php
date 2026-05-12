<?php if(isset($_SESSION['success'])){ ?>
<div class="alert success">
    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
</div>
<?php } ?>

<?php if(isset($_SESSION['error'])){ ?>
<div class="alert error">
    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php } ?>