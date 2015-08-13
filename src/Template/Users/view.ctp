<!-- File: src/Template/Users/view.ctp -->

<div style="display: inline; margin-left: 10px;"><h3 style="display: inline;">User Details</h3>
<span style="display: inline; float: right; margin-right: 10px;">
    <?php
        if($user->deleted == 1) {
            echo $this->Html->link('restore','users/restore/'.$user->id);
        } else {
            echo $this->Html->link('delete','users/delete/'.$user->id);
        }
    ?>
</span>
</div>
<div>
    <table>
        <thead>
            <tr>
                <td><?= $this->Html->link('<- back','/users/') ?></td>
                <td><?= $this->Html->link('edit','/users/edit/'.$user->id) ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td><?= $user->id ?></td>
            </tr>
            <tr>
                <td>username</td>
                <td><?= $user->username ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?= $user->email ?></td>
            </tr>
            <tr>
                <td>role</td>
                <td><?= $user->role ?></td>
            </tr>
            <tr>
                <td>created</td>
                <td><?= $user->created ?></td>
            </tr>
        </tbody>
    </table>
</div>

<h6>Logs</h6>
