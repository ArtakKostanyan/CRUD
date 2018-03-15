<?php
includeView('partials.header');
?>
    <div class="row">
        <form class="col s12" method="post" action="/post-create">
            <div class="row">
                <div class="input-field col s6">
                    <input name="username" id="first_name" type="text" class="validate">
                    <label for="first_name">Username</label>
                </div>
                <div class="input-field col s6">
                    <input name="email" id="last_name" type="text" class="validate">
                    <label for="last_name">Email</label>
                </div>
            </div>
            <button  class="btn waves-effect waves-light" type="submit" name="action">Submit

            </button>
        </form>
    </div>
<?php
includeView('partials.footer');
?>