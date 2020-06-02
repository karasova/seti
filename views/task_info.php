<div class = "heading"></div>
    <h2>Добавить задачу</h2>
</div>

<div align = center>
<form  method = "POST" action="<?= $_SERVER['REQUEST_URI'];?>">
    <table class ="add_event">
        <tr>
            <td>
                Номер:
            </td>
            <td>
                <input type = "text" required  name="number" value = "<?= isset($_POST['number']) ? $_POST['number'] : '' ?>">
            </td>
        </tr>        

        <tr>
            <td>
                Лицевой счет:
            </td>
            <td>
                 <input type = "text" required  name="bill_account" value = "<?= isset($_POST['bill_account']) ? $_POST['bill_account'] : '' ?>">
            </td>
        </tr>

        <tr>
            <td>
                Баланс:
            </td>
            <td>
                 <input type = "text" required  name="balance" value = "<?= isset($_POST['balance']) ? $_POST['balance'] : '' ?>">
            </td>
        </tr>

        
    </table>
    <input type = "submit" value = "Добавить">
    
</form>

<a href ="http://localhost/">Вернуться назад</a>
</div>