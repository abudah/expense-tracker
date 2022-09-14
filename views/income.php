<?php
$this->title='Income';
$income=new \app\models\addIncomeForm();

$values=$income->findAllData();
$record = array_values($values);

?>

<!--<h1>Income Page</h1>-->

<div class="content-3">
    <div class="income-list">
        <div class="title">
            <h2 style="color:#4B7BE5;">Your income list</h2><br>

            <a href="addIncome" class="btn-2"> <i class="fa fa-plus" aria-hidden="true">&nbsp add income</i></a>
        </div>
        <table>
            <tr class="row-heading">

                <th>Name</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Category</th>
                <th></th>


            </tr>

            <?php foreach($record as $row) {?>
                <tr>
                    <td><b><?php echo $row['title'] ?></b> <br ><p style="color: grey;"><?php echo $row['note'] ?></p> </td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['amount']."ETB" ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><form action="" method="post">
                            <input type="text" name="id"  value="<?php echo $row['id']?>" hidden>
                            <button type="submit" class="form-control" name="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></td>
                </tr>


            <?php }?>
        </table>
    </div>



    <div class="pie-chart">
        <div class="title">
            <h2 style="color:#4B7BE5;">your income progress</h2>

            <a href="#" class="view all"></a>
        </div>
        <html>
        <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['category', 'amount'],

                        <?php
                        $sales=0;
                        $credit=0;
                        $Other=0;
                        foreach($record as $row) {


                            if($row['category']=='Sales'){
                                $sales+=$row['amount'];
                            }elseif($row['category']=='Credit'){
                                $credit+=$row['amount'];
                            }elseif($row['category']=='Other'){
                                $Other+=$row['amount'];
                            }

                        }

                        echo "['Sales',".$sales."], ['Credit',".$credit."],['Other',".$Other."],";
                        ?>


                    ]);

                    var options = {

                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>
        </head>
        <body>
        <div id="piechart_3d" style="width: 500px; height: 200px;"></div>


    </div>
</div>