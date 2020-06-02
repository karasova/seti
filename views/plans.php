<div class = "heading">
<h2>Список абонентов</h2>
</div>
<div align = center>


<form method = "POST">
    <table class="event_table">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Лицевой счет</th>
                <th>Баланс</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // $events->put_done();
                echo $events->read_from_db();
            ?>
        </tbody>
    </table>
    <input type = "submit" value = "Применить">
</form>
</div>