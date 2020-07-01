<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Search Form</title>

</head>

<body>

<div class="container-fluid ml-5 mr-5">
    <h1>Medibank Search Form</h1>
    <div class="row">
        <form class="form-horizontal" action="index.php" method="post">
            <label class="control-lable">Expl Number: </label>
            <input type="text" class="form-control" name="explnum" placeholder="explnum">
            <input style="margin-top: 20px" type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>

    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>explnum</th>
                <th>owner</th>
                <th>reason_text</th>
                <th>plain_english_description</th>
                <th>diagnosis</th>
                <th>common_items_numbers_in_medical_claims</th>
                <th>expl_numbers</th>
                <th>common_claim_types</th>
            </tr>
            </thead>


            <tbody>
            <?php
            include("config/db.php");
            if (isset($_POST['submit'])) {
                $explnum = $_POST['explnum'];

                if ($explnum != "") {
                    $query = "SELECT * FROM codes2 WHERE Explnum LIKE '$explnum' ";
                    $data = mysqli_query($conn, $query) or die("error");
                    if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                            $explnum = $row['ExplNum'];
                            $owner = $row['Owner'];
                            $reason_text = $row['ReasonText'];
                            $plain_english_description = $row['PlainEnglishDescription'];
                            $diagnosis = $row['Diagnosis'];
                            $common_items_numbers_in_medical_claims = $row['CommonItemNumbersinMedicalClaims'];
                            $expl_numbers = $row['ExplNumbers'];
                            $common_claim_types = $row['CommonClaimTypes'];
                            ?>
                            <tr>
                                <td><?php echo $explnum; ?></td>
                                <td><?php echo $owner; ?></td>
                                <td><?php echo $reason_text; ?></td>
                                <td><?php echo $plain_english_description; ?></td>
                                <td><?php echo $diagnosis; ?></td>
                                <td><?php echo $common_items_numbers_in_medical_claims; ?></td>
                                <td><?php echo $expl_numbers; ?></td>
                                <td><?php echo $common_claim_types; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>Records not found.</td>
                        </tr>
                        <?php


                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>

</div>


</body>

</html>
