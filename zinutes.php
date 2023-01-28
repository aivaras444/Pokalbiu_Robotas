<?php
//prisijungimas prie duomenu bazes
$conn = mysqli_connect("localhost", "root", "", "robotas") or die("Database Error");

//gaunama naudotojo zinute per ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//tikrinamas naudotojo klausimas duomenu bazes klausimuose
$check_data = "SELECT replies FROM pokalbiurobotas WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

//jaigu naudotojo klausimas sutampa su duomenu bazes klausimu parodo atsakyma jai ne eina prie else
if(mysqli_num_rows($run_query) > 0){
    //grazina atsakyma is duomenu bazes
    $fetch_data = mysqli_fetch_assoc($run_query);
    //saugo atsakyma kintamajame
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Atsiprasau nesuprantu Jusu klausimo";
}

?>