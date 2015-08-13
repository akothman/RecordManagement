<!-- File: src/Template/Users/register.ctp -->

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
                <td><?= $this->Form->input('username',['required' => true]) ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?= $this->Form->email('email',['required' => true]) ?></td>
            </tr>
            <tr>
                <td>password</td>
                <td><?= $this->Form->password('password',['required' => true]) ?></td>
            </tr>
        </tbody>
    </table>
    <?= $this->Form->hidden('role',['default' => 'user']);?>
</div>
<?= $this->Form->button(__('Register')) ?>
<?= $this->Form->end() ?>