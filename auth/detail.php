<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
        <form action='' method='POST'>
				<h2>Confirm Your Payment</h2>
				<input value="<?php  if(isset($_SESSION['username'])){echo $_SESSION['username']; } ?>" type="text" class="field" placeholder="Your Name">
				<input type="number" minlength required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="field" placeholder="Card-number">
				<input type="password" required maxlength=3 minlength=3 class="field" placeholder="CVV">
        <div class="expiry">
                  <h3>Exp Date</h3>
                    <div class="date">
                        <select required name="months" id="months">
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                          </select>
                          <select required name="years" id="years">
                            <option value="2020">2022</option>
                            <option value="2019">2023</option>
                            <option value="2018">2024</option>
                            <option value="2017">2025</option>
                            <option value="2016">2026</option>
                            <option value="2015">2027</option>
                          </select>
                    </div>
                </div>

				<button type='submit' class="btn">Confirm</button>
			</div>
      </form>
		</div>
	</div>
</body>
</html>