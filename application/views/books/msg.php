<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body onload="LoadFunction()">


    <p><?php echo $this->session->flashdata('msg'); ?></p>
    <h1>Hello</h1>





    <script>
        function LoadFunction() {

            <?php
            if ($this->session->flashdata('msg') == 'success') {

            ?>
                Swal.fire(
                    'Data loaded successfully !',
                    '',
                    'success'
                )
            <?php
            }
            ?>
        }
    </script>

</body>

</html>