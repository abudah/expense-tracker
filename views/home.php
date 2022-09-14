<?php
$this->title='home';
$income=new \app\models\addIncomeForm();

$values=$income->findAllData();
$record = array_values($values);

?>
<h1>Home </h1>
<p>Welcome
    <ul>
    <?php foreach($record as $row) {
    echo '<li>Name : '.$row['title'].'</li>';
    }?>
    </ul>
</p>