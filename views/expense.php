<?php
?>
<?php
$this->title='home';
$income=new \app\models\addExpenseForm();

$values=$income->findAllData();
$record = array_values($values);

?>

<!--<h1>Expense Page</h1>-->
    <div class="content-3">

        <div class="income-list">
            <div class="title">
                <h2 style="color:#4B7BE5;">Your expense list</h2><br>

                <a href="addExpense" class="btn-2"> <i class="fa fa-plus" aria-hidden="true">&nbsp add expense</i></a>
            </div>
            <table>
                <tr>

                    <th>Title</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Category</th>
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
                <h2 style="color:#4B7BE5;">your expense progress</h2>

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
                            $rent=0;
                            $loan=0;
                            $insurance=0;
                            $social=0;
                            foreach($record as $row) {


                            if($row['category']=='Rent'){
                                    $rent=$rent+$row['amount'];
                            }elseif($row['category']=='Social'){
                                $social+=$row['amount'];
                            }elseif($row['category']=='Loan'){
                                $loan+=$row['amount'];
                            }elseif($row['category']=='Insurance'){
                                $insurance+=$row['amount'];
                            }

                            }

                            echo "['Rent',".$rent."], ['Loan',".$loan."],['Insurance',".$insurance."],['Social',".$social."],";
                            ?>


                        ]);

                        var options = {

                            title: "My Expenses",
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                </script>
            </head>
            <body>
            <div id="piechart_3d" style="width: 500px; height: 300px;"></div>


        </div>


    </div>
