<!DOCTYPE php>
<?PHP 
session_start();
include "register/config/db.php";
if (!isset($_SESSION['admin_name'])) {
    header("location:register/login.php");
}
?>



<!---delete method--->


 

<!DOCTYPE php>
<html lang="en" style="overflow-x:hidden;">

<head class="bg-dark" style="overflow-x:hidden;">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css.map">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  

  <title>יהונתן גבאי || צילום ויצירת תוכן לעסקים</title>
</head>
<body class="bg-dark">
<header class="bg-dark" style="overflow-x:hidden;">



 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex flex-column justify-content-center" dir="" style="overflow-x:hidden;"> 
  <div class="container text-center w-100" data-aos="zoom-in" data-aos-delay="100">
    <h1 class="text-center text-light ">היי <?php echo $_SESSION['admin_name'];?></h1>
    <h2 data-aos="fade-down" class="mt-5"> <span class="" id="element"></span> </h2>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5 mt-5">
      <form action="register/logout.php" method="post">
        <button type="submit"  class="btn btn-primary btn-lg px-4 me-sm-3 w-100 text-light rounded-5 fw-bold">יציאה מהמשתמש </button>
      </form>
      <form action="#contact" method="post">
        <button type="submit"  class="btn btn-light btn-lg px-4 rounded-5 w-100">טבלת פרטים</button>
      </form>
    </div>
    <button class="btn btn-outline-light  rouned-pill text-light  m-2 mb-5" data-aos="flip-up" id="social-link"><a class="text-light" href="https://www.instagram.com/johnnys_photography"><i class="fa-brands fa-instagram"></i> </a></button>
    <button class="btn btn-outline-light  rouned-pill text-light  m-2 mb-5" data-aos="flip-up" id="social-link"><a class="text-light" href=""><i class="fa-brands fa-whatsapp"></i> </a></button>
    <button class="btn btn-outline-light  rouned-pill text-light  m-2 mb-5" data-aos="flip-up" id="social-link"><a class="text-light" href="https://www.tiktok.com/@jonathan_gabay"><i class="fa-brands fa-tiktok"></i></a></button>
</div>
  </div>
</section><!-- End Hero -->
</header>

<script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>


<script>
   var typed = new Typed('#element', {
    strings: ['ברוך הבא לעמוד ניהול הדף שלך'],
    typeSpeed: 50,
    loop:true
  });


</script>
<body class="bg-dark" style="overflow-x:hidden;">
<main class="bg-dark text-light">
   <!------contact table start----->
  <section class="w-100 mx-5 text-light" id="contact" dir="rtl" style="overflow-x:hidden;">
  <h2 id="contact" class="mx-5">טבלת לידים </h2>
      <p class="mx-5">בחלק זה תוכל לצפות ולמחוק את הלידים שלך שממלאים את המידע שלהם  <a href="../index.php#contact">כאן</a> </p>
      <div class="table-responsive mx-5" >
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th class="text-light" scope="col">#</th>
              <th class="text-light" scope="col">שם</th>
              <th class="text-light" scope="col">דואר אלקטרוני</th>
              <th class="text-light" scope="col">מספר טלפון</th>
              <th class="text-light" scope="col">הודעה</th>
              <th class="text-light" scope="col">מחק</th>
            </tr>
          </thead>
          <tbody>
    <?php
        $sql= "SELECT * FROM `contact`";
        $result = mysqli_query($conn,$sql);
        $datas = Array();
        if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
        $id   =  $row['id'];
        $name = $row['name']."<br>";
        $email = $row['email'];
        $phone = $row['phone'];
        $message = $row['mess'];
   
    ?>
            <tr>
              <td class="text-light"><?php echo $row['id'];?></td>
              <td class="text-light"><?php echo $row['name'];?></td>
              <td class="text-light"><?php echo $row['email'];?></td>
              <td class="text-light"><?php echo $row['phone'];?></td>
              <td class="text-light"><?php echo $row['mess'];?></td>
              <form action="remove.php" class="text-light" method="post"> 
              <td class="text-light"><button class="btn btn-primary text-light" type="submit" name="delete" class="remove"><?php echo 'מחק';?></button></td>
              <td class="text-light"><input type="hidden" name="un_id" value="<?php echo $row['id']; ?>"></td>
            </tr>
      </div>
    </form>
    
    <?php }}   ?>
    </tbody>
        </table>
        <!------table contact end ----->
  </section>
 
  
</section>




<section class="w-100 mx-5" id="admin-users" dir="rtl">
  <h2 id="contact" class="mx-5">משתמשי ניהול</h2>
      <p class="mx-5">בחלק זה אתה יכול לצפות ולמחוק ולהוסיף משתמשי מנהל שיוכלו להיכנס לחלק הזה באתר ולנהל את הלידים שלך </p>
      <div class="table-responsive mx-5" >
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th class="text-light" scope="col">#</th>
              <th class="text-light" scope="col"> שם מלא</th>
              <th class="text-light" scope="col">שם משתמש</th>

            </tr>
          </thead>
          <tbody>
    <?php
        $sql= "SELECT * FROM `users`";
        $result = mysqli_query($conn,$sql);
        $datas = Array();
        if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
        $id   =  $row['id'];
        $admin_name = $row['admin_admin_name']."<br>";
        $user_name = $row['user_name'];
        $password = $row['password'];
   
    ?>
            <tr>
              <td class="text-light" ><?php echo $row['id'];?></td>
              <td class="text-light" ><?php echo $row['admin_name'];?></td>
              <td class="text-light" ><?php echo $row['user_name'];?></td>
              <form action="remove.php" method="post"> 
              <td class="text-light" ><button class="btn btn-primary text-light" type="submit" name="delete" class="remove">מחק</button></td>
              <td class="text-light" ><input type="hidden" name="admin_id" value="<?php echo $row['id']; ?>"></td>
            </tr>
      </div>
    </form>
    
    <?php }}   ?>
    </tbody>
        </table>
        <!------table contact end ----->
  </section>




  <section class="w-100 d-flex justify-content-start align-items-start m-5 " dir="rtl">
<!------insert start----->
<div class="container-fluid mx-5" id="insert-admin">
      <h2 class=" mx-5">הוסף משתמשי ניהול  </h2>
      <p class="mx-5">בסעיף זה תוכל להוסיף פרטים של משתמשי מנהל מערכת.</p>

      <div class="col-lg  ">

        <form action="insert-admin.php" class="d-block mt-3" method="post" enctype="multipart/form-data">


          <div class="col-lg m-2">
          <input type="text" class="w-50" name="admin_name" placeholder="  שם מלא">
          </div>

          <div class="col-lg m-2">
          <input type="text" class="w-50" name="uname" placeholder="שם משתמש">
          </div>

          <div class="col-lg m-2">
          <input type="password" class="w-50" name="password" placeholder="סיסמא">
          </div>

          <div class="col-lg m-2">
          <input type="password" class="w-50" name="re_password" placeholder="חזור על הסיסמא">
          </div>

          <div class="col-lg m-2">
          <input type="submit" class="btn btn-primary w-25 text-light " name="sbmt" value="הכנס משתמש">
          </div>

        </form>
      </div>

      </div>

<!------insert end----->
</section>





    </main>
  </div>
</div>

  
  </body>
  
    
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/main.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
      once: false,
      duration:800
  });
</script>
<script src="https://kit.fontawesome.com/6d6e978759.js" crossorigin="anonymous"></script>
            </html>
