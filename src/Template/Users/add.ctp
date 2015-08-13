<!-- src/Template/add.ctp -->
<h3>User Details</h3>

<?= $this->Form->create($user); ?>
<div>
    <table>
        <thead>
            <tr>
                <td><?= $this->Html->link('<- cancel','/users/') ?></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>username</td>
                <td><?= $this->Form->input('username',['label' => '','required' => true]) ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?= $this->Form->input('email',['label' => '','required' => true]) ?></td>
            </tr>
            <tr>
                <td>password</td>
                <td><?= $this->Form->password('password',['required' => true]) ?></td>
            </tr>
            <tr>
                <td>role</td>
                <td><?= $this->Form->input('role',['label' => '','required' => true]) ?></td>
            </tr>
        </tbody>
    </table>
    <?= $this->Form->hidden('id',['default' => $user->id]);?>
</div>
<?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>