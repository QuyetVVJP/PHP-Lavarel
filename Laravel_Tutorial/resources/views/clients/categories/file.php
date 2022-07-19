<h1> UP LOAD FILE</h1>

<form method="post" action="<?php echo route('categories.upload'); ?>"
      enctype="multipart/form-data">
    <div>
        <input type="file" name="photo" id="">
    </div>
    <?php echo csrf_field() ?>
    <!--    <input type="hidden" name="_token" value="--><?php //echo csrf_token() ?><!--">-->
    <button type="submit">Them File</button>
</form>
