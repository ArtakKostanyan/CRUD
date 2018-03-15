<?php
includeView('partials.header');
?>
<div class="row">
    <form class="col s12" method="post" action="/update">
        <div class="row">
            <?php foreach ($users as $user):?>
            <div class="input-field col s6">
                <input hidden name="id" value="<?=$user['id']?>" >
                <input name="username"   type="text" class="validate" value="<?=$user['username']?>">
                <label for="first_name">Username</label>
            </div>
            <div class="input-field col s6">
                <input name="email" id="last_name" type="text" class="validate" value="<?=$user['email']?>">
                <label for="last_name">Email</label>
            </div>
            <?php endforeach;?>
        </div>
        <button  class="btn waves-effect waves-light" type="submit" name="action">update

        </button>
    </form>
</div>
<?php
includeView('partials.footer');
?>
