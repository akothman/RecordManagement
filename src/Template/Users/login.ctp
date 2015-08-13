<!-- File src/Template/Users/login.ctp -->

<style>
    header {
        display: none;
    }
    div.input.required label {
        display: none;
    }
</style>

<h3 style="text-align: center">Login</h3>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create($user); ?>
<div>
    <table>
        <tbody>
            <tr>
                <td>username</td>
                <td><?= $this->Form->input('username',['label' => '','required' => true]) ?></td>
            </tr>
            <tr>
                <td>password</td>
                <td><?= $this->Form->password('password',['label' => '','required' => true]) ?></td>
            </tr>
        </tbody>
    </table>
    <?= $this->Form->hidden('role',['default' => 'user']);?>
</div>
<div style="width: 100%;"></div><h6 style="text-align: right; margin-left: 10px;"><?= $this->Html->link('Click here to register','/users/register') ?></h6>

<?= $this->Form->button(__('Login')) ?>
<?= $this->Form->end() ?>