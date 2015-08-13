<!-- File: src/Template/Users/index.ctp -->
<h3>User List</h3>
<div class="users" index large-10 medium-9 columns>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>username</td>
                <td>email</td>
                <td><?= $this->Html->link('add user','/users/add') ?></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr <?php if($user->deleted==1) { echo 'class="strike-row"'; }?> >
                    <td><?= $user->id ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $this->Html->link('view','users/view/'.$user->id) ?> /
                        <?= $this->Html->link('edit','users/edit/'.$user->id) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>