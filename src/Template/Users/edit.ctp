<!-- File: src/Template/Users/edit.ctp -->

<div style="display: inline; margin-left: 10px;"><h3 style="display: inline;">Edit User</h3>
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

<?= $this->Form->create($user); ?>
<div>
    <table>
        <thead>
            <tr>
                <td><?= $this->Html->link('<- cancel','/users/view/'.$user->id) ?></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>username</td>
                <td><?= $this->Form->input('username',['label' => '','required' => true,'default' => $user->username]) ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?= $this->Form->input('email',['label' => '','required' => true, 'default' => $user->email]) ?></td>
            </tr>
            <tr>
                <td>role</td>
                <td><?= $this->Form->input('role',['label' => '','required' => true, 'default' => $user->role]) ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>