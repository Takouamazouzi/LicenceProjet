<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
include '../background/db_connect.php';
$sql = "SELECT * FROM repas";
$result=$conn->query(query:$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matbakhii</title>
    <link rel="stylesheet" href="cssstylehealth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />


    <style>
        
        .auth-btn {
            display: inline-block;
            margin-left: 10px;
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
    
        .auth-btn:hover {
            background-color: #2980b9;
        }
        .btn {
            text-decoration: none;
            padding: 10px 20px;
            background: white;
            color: #3498db;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background: #ecf0f1;
        }

        .logout-btn {
            background-color: #d9534f;
            color: white;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }
        .desclass{
            visibility: hidden;
        }.card-price:hover .desclass{
            visibility:visible;
        }

    </style>
<body>

   <section>
    <nav>
       <div class="logo">
  <svg xmlns="http://www.w3.org/2000/svg" class="icon-kitchen-stove" viewBox="0 0 24 24" fill="orange" width="30" height="30" aria-hidden="true">
    <path d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm0 2v2h10V5H7zm0 4v9h10v-9H7zM9 11h2v2H9v-2zm4 0h2v2h-2v-2z"/>
  </svg>
  <span class="logo-text">Matbakhii</span>
</div>

<style>
.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 32px;
  font-weight: bold;
  color: orange;
  cursor: default;
  user-select: none;
  text-shadow: 1px 1px 2px #cc7000;
}

.icon-kitchen-stove {
  flex-shrink: 0;
}
</style>



        <ul>
            
            <ul>
    <li><a href="#Acceuil">Accueil</a></li>
    <li><a href="#about">À propos</a></li>
    <li><a href="#menu_items">Menu</a></li>
    <li><a href="#openReviewsBtn">Avis</a></li>
   
</ul>  
        </ul>
        <div class="icon">
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
           <a href="../View/panier.php">
           <i id="panier" class="fa-solid fa-cart-shopping"></i> 
           </a>
           <?php if (!$isLoggedIn): ?>
            <a href="login.php" class="auth-btn">Se connecter</a>
<a href="signup.html" class="auth-btn">S'inscrire</a>
<?php else: ?>
    <a href="pofile.php"> <i id="userIcon" class="fa-solid fa-user"></i></a>
    <form action="../background/logout.php" method="post">
                <button type="submit" class="btn logout-btn">🔓Déconnecter</button>
            </form>
    <?php endif; ?>
        </div>
        <div class="container">
          
            <div class="form-box" id="register-form">
                <form action="inscrire.php" method="post">
                    <h2>S'inscrire</h2>
                    <input type="text" name="nom"  placeholder="Nom" required>
                    <input type="email" name="email"  placeholder="Email" required>
                    <input type="text" name="adresse"  placeholder="Adresse" required>
                    <input type="tel" name="telephone"  placeholder="Téléphone" required>
                    <input type="password" name="password"  placeholder="Mot de passe" required>
                    <input type="password" name="confirm_password"  placeholder=" Confirmer votre Mot de passe" required>
                    <button type="submit" name="sinscrire">S'inscrire</button>
                    <p>J'ai déjà un compte? <a href="#" onclick="showForm('login-form')">Se connecter</a></p>
                </form>
                
            </div>
        </div>
        
        
        </div> 
       </div>
    </nav>
    <div class="main">
    <div class="men_text">
        <h1><span> Matbakhii,</span><br>votre destination gourmande.</h1>
    </div>
    <p>
        Chez Matbakhii, chaque plat est conçu pour éveiller vos papilles avec des saveurs riches et variées. Explorez notre menu et laissez-vous tenter par une expérience culinaire unique, toujours préparée avec passion
    </p>
    <style>
        /* Reset global */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%;
    font-family: 'Arial', sans-serif;
    background: white;
}

/* Container principal avec image de fond */
.main {

    min-height: 100vh;

    height: 100vh;
    background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    color: white;
    text-align: center;
    overflow: hidden;
    filter: brightness(0.85);
    animation: pulseBrightness 6s ease-in-out infinite;
}

/* Overlay sombre */
.main::before {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 0;
}

/* Texte au-dessus */
.men_text, p {
    position: relative;
    z-index: 1;
    max-width: 700px;
}

/* TITRE - Typing effect + glitch sweep */
.men_text h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    white-space: nowrap;

    border-right: 4px solid #ff8c00;
    width: 22ch; /* ajuster selon texte */
    animation: typing 3s steps(22) forwards, blinkCaret 0.75s step-end infinite;
    position: relative;
    color: #fff;
    text-shadow: 0 0 8px #ff8c00;
}

/* effet vague lumineuse sur titre (glitch sweep) */
.men_text h1::after {
    content: '';
    position: absolute;
    top: 0; left: -50%;
    width: 50%;
    height: 50%;
    background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%);
    transform: skewX(-25deg);
    animation: sweep 3s infinite;
    pointer-events: none;
}

/* SPAN - rebond + pulse */
.men_text h1 span {
    display: inline-block;
    color: #ff8c00;
    font-weight: 900;
    animation: pulseBounce 2s ease-in-out infinite;
}

/* Paragraphe slide + fade */
p {
    font-size: 1rem;
    line-height: 1.6;
    margin-top: 30px;
    padding: 0 15px;
    text-shadow: 0 0 6px rgba(0,0,0,0.7);
    opacity: 0;
    transform: translateX(-40px);
    animation: slideFadeIn 2s 3.2s forwards; /* delay après typing */
}

/* Animations définies */

@keyframes typing {
    from { width: 0; }
    to { width: 22ch; }
}

@keyframes blinkCaret {
    50% { border-color: transparent; }
    100% { border-color: #ff8c00; }
}

@keyframes sweep {
    0% { left: -50%; }
    100% { left: 150%; }
}

@keyframes pulseBounce {
    0%, 100% {
        transform: scale(1);
        text-shadow: 0 0 10px #ff8c00;
    }
    50% {
        transform: scale(1.1) translateY(-10%);
        text-shadow: 0 0 20px #ffd480;
    }
}

@keyframes slideFadeIn {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulseBrightness {
    0%, 100% {
        filter: brightness(0.85);
    }
    50% {
        filter: brightness(1);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .men_text h1 {
        font-size: 2rem;
        width: 18ch;
    }
    
    p {
        font-size: 1rem;
        padding: 0 10px;
    }
}

    </style>
</div>

    
    
   </section>
   <style>
.about-section {
      text-align: center;
      padding: 80px 20px;
      background-color: #ffffff;
    }

    .about-section h2 {
      font-size: 2.8em;
      color: #ff6b35;
      margin-bottom: 20px;
    }

    .about-section p.subheading {
      font-size: 1.2em;
      color: #777;
      margin-bottom: 60px;
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .feature {
      background: #fff;
      border: 2px solid #ffe0b2;
      border-radius: 16px;
      padding: 30px 25px;
      width: 300px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      transition: all 0.3s ease-in-out;
    }

    .feature:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
      border-color:orange;
    }

    .feature-icon {
      font-size: 48px;
      margin-bottom: 20px;
      color:orange;
    }

    .feature h3 {
      color: #e65100;
      margin-bottom: 15px;
      font-size: 1.4em;
    }

    .feature p {
      font-size: 0.95em;
      color: #555;
    }

    .footer {
      background-color: #d35400;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }

    @media (max-width: 768px) {
      .features {
        flex-direction: column;
        align-items: center;
      }

      .feature {
        width: 90%;
      }
    }
  </style>

  <!-- FontAwesome pour les icônes -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

  <section class="about-section" id="about">
    <h2>Bienvenue sur Matbakhii</h2>
    <p class="subheading">Le restaurant en ligne moderne, simple et rapide</p>
<style>
    .subheading {
  text-align: center;
  font-size: 1.5rem;
  font-weight: 500;
  color: #444;
  margin: 20px auto;
  font-style: italic;
}

</style>
    <div class="features">
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-utensils"></i>
        </div>
        <h3>Menu Digital</h3>
        <p> Oublier le papier! Découvrez un menu interactif mis à jour en temps réel, avec photos et descriptions claires.</p>
      </div>

      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <h3>Commandes en Ligne</h3>
        <p>Passez commande rapidement à toute heure, 24h/24, et bénéficiez d’une livraison rapide où que vous soyez.</p>
      </div>

      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-share-alt"></i>
        </div>
        <h3>Réseaux Sociaux</h3>
        <p>Restez connecté avec Matbakhi via les réseaux pour suivre les offres et les nouveautés.</p>
      </div>
    </div>
  </section>
<style>

.auth-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 3px solid #ff6b35;
            object-fit: cover;
        }

        .user-details h4 {
            margin: 0;
            font-size: 1.1rem;
            color: #ecf0f1;
        }

        .user-details p {
            margin: 0;
            font-size: 0.9rem;
            color: #bdc3c7;
        }

        .auth-actions {
            display: flex;
            gap: 10px;
        }

        .login-btn, .logout-btn, .profile-btn {
            padding: 8px 20px;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .login-btn {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .profile-btn {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .profile-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .logout-btn {
            background: rgba(231, 76, 60, 0.8);
            color: white;
        }

        .logout-btn:hover {
            background: rgba(231, 76, 60, 1);
            transform: translateY(-2px);
        }

        /* Bouton pour ouvrir la popup */
        .open-reviews-btn {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            padding: 18px 35px;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            display: block;
            margin: 20px auto 50px;
            position: relative;
            overflow: hidden;
        }

        .open-reviews-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 107, 53, 0.4);
            background: linear-gradient(135deg, #ff7b45, #ff8c1e);
        }

        .open-reviews-btn:active {
            transform: translateY(-1px);
        }

        .open-reviews-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .open-reviews-btn:hover::before {
            left: 100%;
        }

        /* Styles pour la popup */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .popup-content {
            background: linear-gradient(135deg,#d35400);
            border-radius: 20px;
            width: 95%;
            max-width: 1200px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.4s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .popup-header {
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            padding: 20px 30px;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .popup-title {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .close-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .popup-body {
            padding: 0;
        }

        .section {
            background-color: #ffffff;
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 0;
        }

        .popup-content .section {
            background: transparent;
            padding: 30px;
        }

        .popup-content h2 {
            color: white;
        }

        .popup-content .subheading {
            color: rgba(255, 255, 255, 0.9);
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 700;
        }

        .subheading {
            text-align: center;
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 50px;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #e74c3c;
        }

        .testimonial-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .stars {
            font-size: 1.5rem;
            color: #f39c12;
            margin-bottom: 20px;
        }

        .card p {
            font-style: italic;
            color: #555;
            line-height: 1.6;
        }

        /* Styles pour le formulaire d'ajout d'avis */
        .add-review-section {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 20px;
            margin-top: 40px;
            color: white;
        }

        /* Formulaire de connexion dans popup */
        .login-form {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 20px;
            margin: 20px 0;
        }

        .login-form h3 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .demo-accounts {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .demo-accounts h4 {
            color: white;
            margin-bottom: 15px;
            text-align: center;
        }

        .demo-account {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            margin-bottom: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .demo-account:last-child {
            margin-bottom: 0;
        }

        .demo-info {
            color: white;
            font-size: 0.9rem;
        }

        .demo-btn {
            background: #ff6b35;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .demo-btn:hover {
            background: #e55a2b;
            transform: translateY(-1px);
        }

        .add-review-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .add-review-subtitle {
            text-align: center;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .review-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 1.1rem;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            background: rgba(255,255,255,0.95);
            color: #333;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .rating-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .star-rating {
            display: flex;
            gap: 5px;
        }

        .star {
            font-size: 2rem;
            color: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star:hover,
        .star.active {
            color: #f39c12;
            transform: scale(1.1);
        }

        .submit-btn {
            background: white;
            color: #ff6b35;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 30px auto 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            background: #f8f9fa;
            color: #e55a2b;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Message de confirmation */
        .success-message {
            background: #27ae60;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            display: none;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            h2 {
                font-size: 2rem;
            }
            
            .add-review-title {
                font-size: 1.5rem;
            }
            
            .section {
                padding: 40px 15px;
            }

            .popup-content {
                width: 98%;
                margin: 10px;
                max-height: 95vh;
            }

            .popup-header {
                padding: 15px 20px;
            }

            .popup-title {
                font-size: 1.4rem;
            }

            .auth-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .auth-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .user-details h4 {
                font-size: 1rem;
            }

            .login-form, .demo-accounts {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <style>
    .testimonials-section {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .section-header {
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 3rem;
            color: #ff6b35;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(255, 107, 53, 0.1);
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(45deg, #ff6b35, #ff8c42);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-top: 20px;
            font-style: italic;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.1);
            position: relative;
            transform: translateY(0);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #ff6b35, #ff8c42);
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
            border-color: #ff6b35;
        }

        .quote-icon {
            font-size: 3rem;
            color: #ff6b35;
            opacity: 0.3;
            margin-bottom: 20px;
            line-height: 1;
        }

        .testimonial-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #444;
            margin-bottom: 25px;
            font-style: italic;
            position: relative;
        }

        .client-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .client-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff6b35, #ff8c42);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .client-details h4 {
            color: #ff6b35;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .client-details p {
            color: #777;
            font-size: 0.9rem;
        }

        .rating {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            gap: 5px;
        }

        .star {
            color: #ffa500;
            font-size: 1.5rem;
            transition: transform 0.2s ease;
        }

        .star:hover {
            transform: scale(1.2);
        }

        .stats-section {
            margin-top: 80px;
            background: linear-gradient(45deg, #ff6b35, #ff8c42);
            padding: 50px;
            border-radius: 25px;
            color: white;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-top: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2.2rem;
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .testimonial-card {
                padding: 25px;
            }
            
            .stats-section {
                padding: 30px 20px;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 107, 53, 0.1), rgba(255, 140, 66, 0.1));
            animation: float 6s ease-in-out infinite;
        }

        .floating-elements::before {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-elements::after {
            width: 150px;
            height: 150px;
            bottom: 10%;
            right: 10%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body>
    <div class="floating-elements"></div>
    
    <section class="testimonials-section">
        <div class="section-header">
            <h2 class="section-title">Ce que disent nos clients</h2>
            <p class="section-subtitle">Découvrez les avis authentiques de nos clients satisfaits</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"Une expérience culinaire exceptionnelle ! Les plats sont délicieux et authentiques. L'ambiance chaleureuse et le service impeccable font de Matbakhi mon restaurant préféré."</p>
                <div class="client-info">
                    <div class="client-avatar">SA</div>
                    <div class="client-details">
                        <h4>Sarah Ahmed</h4>
                        
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"La qualité des ingrédients et la fraîcheur des plats sont remarquables. Chaque visite est un voyage culinaire inoubliable. Je recommande vivement Matbakhi !"</p>
                <div class="client-info">
                    <div class="client-avatar">MK</div>
                    <div class="client-details">
                        <h4>Mohamed Karim</h4>
                       
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"Un service client exceptionnel et des saveurs authentiques qui me rappellent la cuisine de ma grand-mère. Matbakhi est devenu notre lieu de rendez-vous familial."</p>
                <div class="client-info">
                    <div class="client-avatar">LB</div>
                    <div class="client-details">
                        <h4>Leila Benali</h4>
                    
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"Ambiance conviviale, prix raisonnables et surtout une cuisine savoureuse ! L'équipe est très accueillante. Je ne peux que recommander ce restaurant."</p>
                <div class="client-info">
                    <div class="client-avatar">YM</div>
                    <div class="client-details">
                        <h4>Youssef k</h4>
                    
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"Une découverte fantastique ! La présentation des plats est soignée et les goûts sont au rendez-vous. Matbakhi mérite vraiment sa réputation d'excellence."</p>
                <div class="client-info">
                    <div class="client-avatar">NH</div>
                    <div class="client-details">
                        <h4>Nadia Hamidi</h4>
                        
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">"</div>
                <div class="rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <p class="testimonial-text">"Chaque plat raconte une histoire et chaque bouchée est un plaisir. L'attention aux détails et la passion pour la cuisine se ressentent dans chaque assiette."</p>
                <div class="client-info">
                    <div class="client-avatar">AB</div>
                    <div class="client-details">
                        <h4>Ahmed Bousquet</h4>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-section">
            <h3 style="font-size: 2.5rem; margin-bottom: 20px;">Nos clients nous font confiance</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Clients satisfaits</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.9/5</div>
                    <div class="stat-label">Note moyenne</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Recommandations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Années d'excellence</div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

   <div class="menu" id="menu">
    <h2>Menu</h2>
    <style>
        h2{
            color: orange;
        }
    </style>
    <div class="filters">
        <button class="filter-btn active" data-filter="all" onclick="filterMenu('all')">Tout</button>
        <button class="filter-btn"  data-filter="pizza"onclick="filterMenu('pizza')">Pizza</button>
        <button class="filter-btn" data-filter="pasta" onclick="filterMenu('pasta')">Pasta</button>
        <button class="filter-btn" data-filter="grille" onclick="filterMenu('grille')">Grille</button>
        <button class="filter-btn" data-filter="sucré"  onclick="filterMenu('sucré')">Sucré</button>
        <button class="filter-btn" data-filter="boisson"  onclick="filterMenu('boisson')">Boisson</button>
    </div>



    <div class="menu-items" id="menu_items">
    <script>
        function filterMenu(category) {
  let items = document.querySelectorAll(".menu-items .item");
  
  items.forEach(item => {
    if (category === 'all') {
      item.style.display = "block";
    } else {
      if (item.classList.contains(category)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    }
  });
  
  // Gérer l'état actif des boutons (correction)
  let buttons = document.querySelectorAll(".filter-btn");
  buttons.forEach(button => {
    if (button.dataset.filter === category) {
      button.classList.add("active");
    } else {
      button.classList.remove("active");
    }
  });
}
     </script>
<!-- Ceci est un commentaire en HTML   <div class="menu-items">
        <div class="item grille">
            <img src="c:\Users\DELL\Documents\final\images\eac846dc1fd0a52d101b77cc5f9b5fb2.jpg" alt="">
            <h4 class="card-title">Brochette viande</h4><div class="card-price">
                <div class="price ">1500 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        
        <div class="item pizza">
            <img src="c:\Users\DELL\Desktop\final\images\fromage.jpg" alt="">
            <h4 class="card-title">Pizza au fromage</h4>
            <div class="card-price">
                <div class="price ">800 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item pizza">
            <img src="c:\Users\DELL\Desktop\final\images\pizza3.jpg" alt="">
            <h4 class="card-title">Pizza Sauce Blanche</h4>
            <div class="card-price">
                <div class="price ">900 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        
        <div class="item pizza">
            <img src="images/pizza2.jpg" alt="">
            <h4 class="card-title">Pizza Olive</h4>
            <div class="card-price">
                <div class="price ">600 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item pizza">
            <img src="images/téléchargement (2).jpg" alt="">
            <h4 class="card-title">Pizza Margeritta</h4>
            <div class="card-price">
                <div class="price ">400 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
       

        <div class="item boisson">
            <img src="c:\Users\DELL\Desktop\final\images\th&.jpg" alt="">
            <h4 class="card-title">Thé vert</h4>
            <div class="card-price">
                <div class="price ">100 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>

    
        <div class="item boisson">
            <img src="images/rami.jpg" alt="">
            <h4 class="card-title">Rami</h4>
            <div class="card-price">
                <div class="price ">250 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>

        <div class="item boisson">
            <img src="images/ham.jpg" alt="">
            <h4 class="card-title">Hamoud Boualem</h4>
            <div class="card-price">
                <div class="price ">100 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item boisson">
            <img src="c:\Users\DELL\Desktop\final\images\ifri.jpg" alt="">
            <h4 class="card-title">Ifri 1,5L</h4>
            <div class="card-price">
                <div class="price ">50 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item pasta">
            <img src="c:\Users\DELL\Documents\final\images\téléchargement.jfif" alt="">
            <h4 class="card-title">Pasta Sbaghetti</h4>
            <div class="card-price">
                <div class="price ">1200 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item grille">
            <img src="c:\Users\DELL\Documents\final\images\86dc4eb97a035fa1e55a7678942918cb.jpg" alt="">
            <h4 class="card-title">Poisson Grillé</h4>
            <div class="card-price">
                <div class="price ">900 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item sucré">
            <img src="c:\Users\DELL\Desktop\final\images\tiramisu.jpg" alt="">
            <h4 class="card-title">Tiramisu</h4>
            <div class="card-price">
                <div class="price ">450 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item sucré">
            <img src="images/gauffre chocolat noir.jpg" alt="">
            <h4 class="card-title">Gauffre Nutelle</h4>
            <div class="card-price">
                <div class="price ">400 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item pasta">
            <img src="c:\Users\DELL\Desktop\final\images\téléchargement (5).jpg" alt="">
            <h4 class="card-title">Pasta Sauce Blanche</h4>
            <div class="card-price">
                <div class="price ">600 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
        <div class="item sucré">
            <img src="c:\Users\DELL\Desktop\final\images\crepe.jpg" alt="">
            <h4 class="card-title">Gauffre Nutelle</h4>
            <div class="card-price">
                <div class="price ">300 DA</div>
                <i class="fa-solid fa-plus add-to-card"></i>
            </div>
        </div>
      -- -->

        <?php while($row=$result->fetch_assoc()): ?>
            
<div class="<?='item ' . htmlspecialchars($row['category']) ?>" onclick="openModal(
    '<?= addslashes(htmlspecialchars($row['image'])) ?>',
    '<?= addslashes(htmlspecialchars($row['nom'])) ?>',
    '<?= addslashes(htmlspecialchars($row['prix'])) ?>',
    '<?= addslashes(htmlspecialchars($row['description'])) ?>'
)">

    <img src="<?= htmlspecialchars($row['image']) ?>" alt="Repas Image">
  
    <h4 class="card-title"><?=htmlspecialchars($row['nom'])?></h4>
    <div class="card-price">
        <div class="price"><?=htmlspecialchars($row['prix'])?>DA</div>
        <form action="../background/ajouterAuPanier.php" method="post" >
        <input type="hidden" name="id_repas" value="<?= htmlspecialchars($row['id_repas']) ?>"  >
        <input type="hidden" name="name" value="<?= htmlspecialchars($row['nom']) ?>"  >
        <input type="hidden" class="desclass" name="description" value="<?= htmlspecialchars($row['description']) ?>"  >
        <input type="hidden" name="price" value="<?= htmlspecialchars($row['prix']) ?>"  >
        <input type="hidden" name="image" value="<?= htmlspecialchars($row['image']) ?>">
          <input type="hidden" name="quantite" value="<?= htmlspecialchars($row['quantite']) ?>">
    
        <button name="add_to_cart"> <i class="fa-solid fa-plus add_to_cart"></i></button>
        
        </form>
    </div>
    <form action="../background/add_feedback.php" method="get" style="display: inline;">
        <input type="hidden" name="repas_id" value="<?= $row['id_repas'] ?>">
        <button type="submit" style="font-size: 10px;">Ajouter un Feedback</button>
    </form>
    <form action="../background/view_feedback.php" method="get" style="display: inline;">
        <input type="hidden" name="repas_id" value="<?= $row['id_repas'] ?>">
        <button type="submit" style="font-size: 10px;">Voir Feedbacks</button>
    </form>
    
</div>

<?php endwhile; ?>

<!-- Modal Structure -->
<div id="foodModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="Repas Image" style="max-width: 100%; max-height: 300px; display: block; margin: 0 auto;">
        <h2 id="modalTitle" style="margin-top: 20px;"></h2>
        <p id="modalPrice" style="font-weight: bold; font-size: 1.5em; color: #e67e22;"></p>
        <p id="modalDescription" style="margin-top: 15px; line-height: 1.6;"></p>
    </div>
</div>

<script>
// Fonction pour ouvrir la modal
function openModal(image, title, price, description) {
    document.getElementById('modalImage').src = image;
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalPrice').textContent = price + ' DA';
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('foodModal').style.display = 'block';
    
    // Debug: Vérifiez les valeurs dans la console
    console.log('Image:', image);
    console.log('Title:', title);
    console.log('Price:', price);
    console.log('Description:', description);
}

// Fonction pour fermer la modal
function closeModal() {
    document.getElementById('foodModal').style.display = 'none';
}

// Fermer la modal si on clique en dehors
window.onclick = function(event) {
    const modal = document.getElementById('foodModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<style>
/* Style pour la modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
    overflow: auto;
}

.modal-content {
    background-color: #fefefe;
    margin: 50px auto;
    padding: 30px;
    border: 1px solid #888;
    width: 80%;
    max-width: 700px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    animation: modalopen 0.4s;
}


.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.close:hover {
    color: #000;
    transform: scale(1.2);
}
</style>
    
        
        
       

    </div>
</div>
<style>
    /* Styles du footer amélioré */
    .footer {
        background: linear-gradient(135deg, #FF8C00, #FF5722);
        color: #fff;
        padding: 40px 0 20px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        position: relative;
        overflow: hidden;
    }

    /* Éléments décoratifs */
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, transparent, #FFC107, transparent);
        animation: shimmer 3s infinite linear;
    }

    /* Motifs décoratifs pour le fond */
    .footer::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.08) 0%, transparent 10%),
            radial-gradient(circle at 80% 10%, rgba(255, 255, 255, 0.08) 0%, transparent 10%),
            radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 15%),
            radial-gradient(circle at 90% 70%, rgba(255, 255, 255, 0.08) 0%, transparent 12%);
        opacity: 0.6;
        z-index: 0;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }

    .footer-section {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        position: relative;
    }

    .footer-section:nth-child(1) { animation-delay: 0.1s; }
    .footer-section:nth-child(2) { animation-delay: 0.2s; }
    .footer-section:nth-child(3) { animation-delay: 0.3s; }
    .footer-section:nth-child(4) { animation-delay: 0.4s; }

    .footer-section:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }

    .footer-section h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
        font-weight: 600;
        position: relative;
        padding-bottom: 10px;
        transition: all 0.3s ease;
    }

    .footer-section h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 30px;
        height: 2px;
        background: #FFC107;
        transition: width 0.3s ease;
    }

    .footer-section:hover h3::after {
        width: 50px;
    }

    .footer-logo {
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .footer-logo::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: #FFC107;
        transition: width 0.3s ease;
    }

    .footer-logo:hover::after {
        width: 100%;
    }

    .footer-logo img {
        height: 40px;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        transition: transform 0.3s ease;
    }

    .footer-logo:hover img {
        transform: scale(1.05);
    }

    .about-us p {
        margin-bottom: 15px;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    .social-icons {
        display: flex;
        gap: 12px;
        margin-top: 15px;
    }

    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        position: relative;
        overflow: hidden;
    }

    .social-icons a::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: scale(0);
        transition: transform 0.3s ease;
        border-radius: 50%;
    }

    .social-icons a:hover {
        background-color: #fff;
        color: #FF8C00;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .social-icons a:hover::before {
        transform: scale(1.5);
        opacity: 0;
    }

    .quick-links ul {
        padding-left: 0;
    }

    .quick-links ul li {
        margin-bottom: 10px;
        list-style: none;
        position: relative;
        transition: all 0.3s ease;
    }

    .quick-links ul li::before {
        content: '›';
        position: absolute;
        left: -15px;
        top: 0;
        color: #FFC107;
        font-size: 1.2rem;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .quick-links ul li:hover::before {
        opacity: 1;
        left: -10px;
    }

    .quick-links ul li a {
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.85rem;
        position: relative;
        padding-bottom: 2px;
    }

    .quick-links ul li a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 1px;
        background: #FFC107;
        transition: width 0.3s ease;
    }

    .quick-links ul li a:hover {
        color: #FFC107;
        padding-left: 5px;
    }

    .quick-links ul li a:hover::after {
        width: 100%;
    }

    .contact-info {
        position: relative;
    }

    .contact-info ul {
        padding-left: 0;
    }

    .contact-info li {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 0.85rem;
        transition: transform 0.3s ease;
    }

    .contact-info li:hover {
        transform: translateX(5px);
    }

    .contact-info i {
        margin-right: 10px;
        width: 15px;
        font-size: 0.9rem;
        color: #FFC107;
        transition: transform 0.3s ease;
    }

    .contact-info li:hover i {
        transform: scale(1.2);
    }

    .newsletter p {
        margin-bottom: 15px;
        line-height: 1.5;
    }

    .newsletter form {
        display: flex;
        margin-top: 15px;
        position: relative;
    }

    .newsletter input {
        flex-grow: 1;
        padding: 10px 15px;
        border: none;
        border-radius: 25px 0 0 25px;
        outline: none;
        font-size: 0.8rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .newsletter input:focus {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .newsletter button {
        background-color: #FFC107;
        color: #fff;
        border: none;
        padding: 0 18px;
        border-radius: 0 25px 25px 0;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .newsletter button:hover {
        background-color: #fff;
        color:#d35400;
        transform: translateX(2px);
    }

    .newsletter button i {
        transition: transform 0.3s ease;
    }

    .newsletter button:hover i {
        transform: translateX(3px);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 25px;
        margin-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 0.75rem;
        animation: fadeIn 0.6s ease 0.5s forwards;
        opacity: 0;
        position: relative;
    }

    .footer-bottom::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background: #FFC107;
        border-radius: 10px;
    }

    .footer-bottom p {
        position: relative;
        display: inline-block;
    }

    .footer-bottom p::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: #d35400;
        transition: width 0.3s ease;
    }

    .footer-bottom:hover p::after {
        width: 100%;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes shimmer {
        0% { background-position: -100% 0; }
        100% { background-position: 200% 0; }
    }

    @keyframes float {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }

    /* Animations de fond */
    .floating-shape {
        position: absolute;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }

    .shape1 {
        width: 100px;
        height: 100px;
        top: 10%;
        left: 5%;
        animation: float 8s infinite ease-in-out;
    }

    .shape2 {
        width: 60px;
        height: 60px;
        top: 40%;
        right: 10%;
        animation: float 6s infinite ease-in-out;
        animation-delay: 1s;
    }

    .shape3 {
        width: 80px;
        height: 80px;
        bottom: 15%;
        left: 15%;
        animation: float 10s infinite ease-in-out;
        animation-delay: 2s;
    }

    /* Effet hover sur les sections */
    .footer-section {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .footer-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer {
            padding: 30px 0 15px;
        }
        
        .footer-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .footer-section {
            text-align: center;
        }
        
        .footer-section h3::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .social-icons {
            justify-content: center;
        }
        
        .contact-info li {
            justify-content: center;
        }

        .quick-links ul li::before {
            display: none;
        }
    }
</style>
<style>
        
        .faq-section {
            max-width: 900px;
            margin: 0 auto;
            padding: 60px 20px;
            opacity: 1;
            transform: translateY(0);
            transition: all 0.8s ease;
        }

        .faq-section.hidden {
            opacity: 0;
            transform: translateY(30px);
            pointer-events: none;
        }

        .faq-section.visible {
            opacity: 1;
            transform: translateY(0);
            pointer-events: all;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .faq-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ff6b35;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(255, 107, 53, 0.1);
        }

        .faq-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .faq-container {
            display: grid;
            gap: 20px;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(255, 107, 53, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 107, 53, 0.15);
            border-color: #ff6b35;
        }

        .faq-question {
            padding: 25px 30px;
            background: linear-gradient(135deg, #ff6b35 0%, #ff8f65 100%);
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 1.1rem;
            user-select: none;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: linear-gradient(135deg, #d35400 0%,#d35400 100%);
        }

        .faq-icon {
            width: 24px;
            height: 24px;
            border: 2px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.3s ease;
            flex-shrink: 0;
            margin-left: 15px;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            padding: 0 30px;
            background: white;
            transition: all 0.4s ease;
            opacity: 0;
        }

        .faq-answer-content {
            padding: 25px 0;
            color: #555;
            font-size: 1rem;
            line-height: 1.7;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
            opacity: 1;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-item.active .faq-question {
            background: linear-gradient(135deg, #e55a2b 0%, #ff7b4f 100%);
        }

        .highlight {
            color: #ff6b35;
            font-weight: 600;
        }

       .contact-cta {
    background-color: #f8f9fa;
    padding: 2rem;
    border-radius: 8px;
    text-align: center;
    margin-top: 2rem;
}

.contact-cta h3 {
    color: #2c3e50;
    margin-bottom: 1rem;
}

.contact-cta p {
    color: #7f8c8d;
    margin-bottom: 1.5rem;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
    align-items: center;
}

.contact-info p {
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-info a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s;
}

.contact-info a:hover {
    color: #2980b9;
    text-decoration: underline;
}

.fas {
    color: #e74c3c;
}

        @media (max-width: 768px) {
            .faq-title {
                font-size: 2rem;
            }
            
            .faq-question {
                padding: 20px;
                font-size: 1rem;
            }
            
            .faq-answer-content {
                padding: 20px 0;
            }
            
            .contact-cta {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <section class="faq-section" id="faq">
        <div class="faq-header">
            <h1 class="faq-title">Questions Fréquentes</h1>
            <p class="faq-subtitle">Trouvez rapidement les réponses à vos questions sur notre système de gestion de restaurant</p>
        </div>

    

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span> Comment puis-je suivre ma commande ?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Une fois votre commande validée, vous recevrez un e-mail avec un lien de suivi. Vous pouvez également consulter le statut depuis <span class="highlight"> votre espace client.</span> 
                    </div>
                </div>
            </div>

           
           

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Quels sont les délais de livraison ?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Les délais de livraison varient selon votre emplacement, généralement  <span class="highlight">entre 40 à 45 minutes.</span> 
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Comment sont sécurisées les données de mes clients ?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        La sécurité est notre priorité absolue. Nous utilisons un <span class="highlight">chiffrement de niveau bancaire</span>, des sauvegardes automatiques quotidiennes, et nous sommes conformes au RGPD. Vos données et celles de vos clients sont protégées par les plus hauts standards de sécurité.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Combien coûte le système et y a-t-il des frais cachés ?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Nous acceptons les paiements par carte bancaire, PayPal, et virement bancaire <span class="highlight"> carte bancaire, PayPal, et virement bancaire</span>
                    </div>
                </div>
            </div>
        </>

        <div class="contact-cta">
    <h3>Vous ne trouvez pas votre réponse ?</h3>
    <p>Notre équipe est là pour vous aider à optimiser la gestion de votre restaurant</p>
    <div class="contact-info">
        <p><i class="fas fa-envelope"></i> Email : <a href="matbakhi23@gmail.com">matbakhi23@gmail.com</a></p>
        <p><i class="fas fa-phone"></i> Téléphone : <a href="tel:0659206244">0659206244</a></p>
    </div>
</div>
    </section>

    <script>
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Fermer tous les autres éléments FAQ
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Ouvrir l'élément cliqué s'il n'était pas déjà ouvert
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }

        function contactSupport() {
            alert('Redirection vers le formulaire de contact...');
           
        }

        // Animation d'apparition au scroll et navigation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observer tous les éléments FAQ
        document.querySelectorAll('.faq-item').forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(item);
        });

        // Fonction pour basculer l'affichage de la FAQ (toggle)
        function toggleFAQ() {
            const faqSection = document.getElementById('faq');
            
            if (faqSection.classList.contains('visible') && !faqSection.classList.contains('hidden')) {
                // Si la FAQ est visible, la masquer
                hideFAQ();
                // Retirer le hash de l'URL
                history.pushState(null, null, window.location.pathname);
            } else {
                // Si la FAQ est masquée, l'afficher
                showFAQ();
                // Ajouter le hash à l'URL
                history.pushState(null, null, '#faq');
            }
        }

        // Fonction pour afficher la FAQ depuis le footer ou navigation
        function showFAQ() {
            const faqSection = document.getElementById('faq');
            faqSection.classList.remove('hidden');
            faqSection.classList.add('visible');
            
            // Scroll vers la section avec un petit délai pour l'animation
            setTimeout(() => {
                faqSection.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }, 100);
        }

        // Fonction pour masquer la FAQ
        function hideFAQ() {
            const faqSection = document.getElementById('faq');
            faqSection.classList.add('hidden');
            faqSection.classList.remove('visible');
        }

        // Gestion de l'affichage au chargement de la page
        window.addEventListener('DOMContentLoaded', function() {
            const faqSection = document.getElementById('faq');
            
            // Vérifier si on doit afficher la FAQ
            if (window.location.hash === '#faq' || 
                window.location.search.includes('faq') ||
                window.location.pathname.includes('faq')) {
                showFAQ();
            } else {
                // Par défaut, la FAQ est visible (vous pouvez changer cela)
                faqSection.classList.add('visible');
            }
        });

        // Gestion des changements de hash dans l'URL
        window.addEventListener('hashchange', function() {
            if (window.location.hash === '#faq') {
                showFAQ();
            }
        });

        // Écoute des clics sur liens FAQ avec effet toggle
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && (
                e.target.getAttribute('href') === '#faq' ||
                e.target.href.includes('#faq') || 
                e.target.textContent.toLowerCase().includes('faq') ||
                e.target.textContent.toLowerCase().includes('questions')
            )) {
                e.preventDefault();
                toggleFAQ(); // Utiliser toggle au lieu de showFAQ
            }
        });
    </script>
</body>
</html>
<footer class="footer">
    <!-- Formes décoratives flottantes -->
    <div class="floating-shape shape1"></div>
    <div class="floating-shape shape2"></div>
    <div class="floating-shape shape3"></div>
    
    <div class="footer-container">
        <div class="footer-section about-us">
            <div class="footer-logo">
                Matbakhii
            </div>
            <p>Savourez l'excellence culinaire chez Matbakhii. Plats authentiques préparés avec passion et tradition.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
        
        <div class="footer-section quick-links">
            <h3>Liens Rapides</h3>
            <ul>
                <li><a href="#Acceuil">Accueil</a></li>
                <li><a href="#about">À propos</a></li>
                <li><a href="#menu_items">Menu</a></li>
                <li><a href="#openReviewsBtn">Avis</a></li>
                <li><a href="#faq">FAQ</a></li>
              


            
            </ul>
        </div>
        
        <div class="footer-section contact-info">
            <h3>Contact</h3>
            <ul>
               
                <li><i class="fas fa-phone"></i> 0659206244</li>
                <li><i class="fas fa-envelope"></i> matbakhi23@gmail.com</li>
                
            </ul>
      
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2025 Matbakhii. Tous droits réservés</p>
    </div>

    <script>
        
        // Animation au défilement
        document.addEventListener('DOMContentLoaded', function() {
            // Effet de défilement pour les sections
            const footerSections = document.querySelectorAll('.footer-section');
            
            // Observer les entrées dans la viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            footerSections.forEach(section => {
                observer.observe(section);
            });
            
            // Animation pour le bouton de newsletter
            const newsletterButton = document.querySelector('.newsletter button');
            if (newsletterButton) {
                newsletterButton.addEventListener('mouseenter', function() {
                    this.querySelector('i').style.transform = 'translateX(3px)';
                });
                
                newsletterButton.addEventListener('mouseleave', function() {
                    this.querySelector('i').style.transform = 'translateX(0)';
                });
            }
        });
    </script>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init();
</script>


</body>
</html>
