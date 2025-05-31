<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-box input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-box button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-box button:hover {
            background-color: #2980b9;
        }

        .form-box p {
            margin-top: 15px;
            text-align: center;
            color: #555;
        }

        .form-box a {
            color: #3498db;
            text-decoration: none;
        }

        .form-box a:hover {
            text-decoration: underline;
        }
        .errormsg{
            margin-top: 5px;
            padding: 3px;
            background-color: #E94141;
            color: white;

        }
    </style>
</head>
<body>
    <div class="form-box active" id="login-form">
        <?php if(isset($_GET['error'])){?>
            <p class="errormsg" style="color : white;"> <?php echo $_GET['error'];?></p>
            <?php }?>

        <form action="../background/login.php" method="post">
            <h2>Se connecter</h2>
            <?php if(isset($_GET['email'])){?>
                <input type="email" name="email" placeholder="Email" value=" <?php echo $_GET['email'];?>">
        <?php } else {?>
    <input type="email" name="email" placeholder="Email"><?php } ?>
            
            <input type="password" name="motDePasse"  placeholder="Mot de passe">
            <button type="submit" name="SeConnecter">Se connecter</button>
            <p>Vous n'avez pas de compte? <a href="Signup.html" >s'inscrire</a></p>
        </form>
    </div>
</body>
</html>