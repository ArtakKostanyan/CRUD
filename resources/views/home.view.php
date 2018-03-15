<?php
includeView('partials.header');
?>

    <div class="row">
        <div class="col s12">
            <div class="btn-group btn-group-sm btn-delete-all-group" role="group">
                <a href="/create" class="btn btn-success btn-add-new">Add new</a>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col s12">

            <table class=" bordered" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td> <div>
                                <a data-id="<?=$user['id'] ?>"  class="deleteItem waves-effect waves-light btn-large red">Delete</a>
                            </div>
                        </td>
                        <td>
                            <form method="post" action="/edit">
                                <input type="text" value="<?=$user['id'] ?>" name="username" hidden >
                                <button class="btn waves-effect waves-light" type="submit" >Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!--Edit Modal-->

<?php
includeView('partials.footer');
?>