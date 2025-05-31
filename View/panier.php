<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List View of Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .listeProduct {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.product {
    background-color: #fff;
    width: 100%;
    max-width: 380px;
    border: 1px solid #ddd;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.detailImg {
    display: flex;
    padding: 15px;
}

.product img {
    width: 150px;
    height: 180px;
    border-radius: 8px;
    object-fit: cover;
    margin-right: 15px;
}

.product-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product h2 {
    font-size: 18px;
    margin: 0 0 10px;
    color: #333;
}

.product p {
    margin: 4px 0;
    font-size: 14px;
    color: #666;
}

.description {
    margin-top: 10px;
    font-size: 13px;
    color: #555;
}

.quantity-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0;
}

.quantity-buttons {
    display: flex;
    align-items: center;
}

.quantity-buttons button {
    background-color: #eee;
    border: none;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 4px;
    margin: 0 5px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.quantity-buttons button:hover {
    background-color: #ccc;
}

.wishlist-icon {
    color: red;
    font-size: 20px;
    cursor: pointer;
}

.add-to-cart-button {
    background-color: #4CAF50;
    border: none;
    border-radius: 6px;
    color: white;
    padding: 10px 20px;
    font-size: 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-to-cart-button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<a href="profile.php"><img src="arrow.png" width="40px"></a>
<div class="menu-button-container">
    <a href="index.php" class="menu-button">Voir le menu</a>
</div>
<style>
    .menu-button-container {
    text-align: center;
    margin-bottom: 20px;
}

.menu-button {
    display: inline-block;
    background-color:orange;
    color: white;
    text-decoration: none;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 8px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.menu-button:hover {
    background-color:orange;
    transform: translateY(-2px);
}

</style>
<form id="commandeForm" action="../background/traiter_commande.php" method="POST">
    <div id="message" style="display: none; color: red; text-align: center; margin-bottom: 10px;"></div>



 
  <label for="date_commande">Date de commande :</label>
  <input type="datetime-local" id="date_commande" name="date_commande" required>

  <label for="paiement">Type de paiement :</label>
  <select id="paiement" name="paiement" required>
    <option value="">-- Sélectionnez --</option>
    <option value="Carte bancaire">Carte bancaire</option>
    <option value="PayPal">PayPal</option>
    <option value="Espèces">Espèces</option>
  </select>
  

  <?php
session_start();

  
  $totalPrice = 0;

  if (!empty($_SESSION['cart'])) {
      echo '<div class="listeProduct" id="cart-container">';
      
      foreach ($_SESSION['cart'] as $key => $product) {
          $quantity = 1;
          $price = $product['price'] * $quantity;
          $totalPrice += $price;
          $maxQ=$product['quantite'];

          $productId = $product['id_repas'] ?? $key;
           
          echo "<div class='product' id='product_$key'>";
          echo "  <div class='detailImg'>";
          echo "    <img src='" . htmlspecialchars($product['photo']) . "' alt='photo produit'>";
          echo "    <div class='product-details'>";
          echo "      <h2>" . htmlspecialchars($product['nom']) . "</h2>";
          echo "      <p><strong>Prix:</strong> <span  class='price' id='price_$productId'>" . $product['price'] . "</span> DA</p>";
          echo "    </div>";
          echo "    <a href='#' onclick='removeFromCart($key)'>Supprimer</a>";
          echo "  </div>";

          echo "  <div class='buttom'>";
          echo "    <div class='description'>";
          echo "      <p><strong>Description:</strong> " . htmlspecialchars($product['description']) . "</p>";
          echo "    </div>";
          echo "    <div class='quantity-container'>";
          echo "      <div class='quantity-buttons'>";
          echo "        <button type='button' class='minus' name='minus' onclick='changeQuantity(this, -1, " . $product['price'] . ", $productId,$maxQ)'>-</button>";
          echo "        <span class='quantity' id='quantity_span_$productId'>$quantity</span>";
          echo "        <button type='button'  class='plus' name='plus' onclick='changeQuantity(this, 1, " . $product['price'] . ", $productId,$maxQ)'>+</button>";
          echo "      </div>";
          echo "    </div>";
          echo "  </div>";
          echo "</div>";

          // Champs cachés
          echo "<input type='hidden' name='products[$key][id_repas]' value='$productId'>";
          echo "<input type='hidden' name='products[$key][quantity]' value='$quantity' id='form_quantity_$productId'>";
          echo "<input type='hidden' name='products[$key][price]' value='$price' id='form_price_$productId'>";
      }

      echo "</div>";
      echo "<h3>Total: <span id='totalPrice'>" . number_format($totalPrice, 2) . "</span> DA</h3>";
      echo "<input type='hidden' name='total_price' id='hiddenTotalPrice' value='" . number_format($totalPrice, 2, '.', '') . "'>";
  } else {
      echo "<h2>Votre panier est vide</h2>";
  }
  ?>
  
  <button name="submit">Commander</button>
</form>


<!-- Modal caché -->
<div id="successModal" style="
  display:none;
  position: fixed;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: #e67e22;
  color: white;
  padding: 20px 30px;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(230, 126, 34, 0.7);
  font-size: 18px;
  text-align: center;
  z-index: 1000;
">
  <p>Commande passée avec succès !</p>
  <button onclick="closeModal()" style="
    margin-top: 10px;
    background: white;
    color: #e67e22;
    border: none;
    padding: 5px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
  ">OK</button>
</div>

<script>
  const orderBtn = document.getElementById('orderBtn');
  const modal = document.getElementById('successModal');

  orderBtn.addEventListener('click', function(e) {
    e.preventDefault(); // Empêche l'envoi du formulaire si c'est un submit
    modal.style.display = 'block';
  });

  function closeModal() {
    modal.style.display = 'none';
  }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function showMessage(text){
        const messageDiv=document.getElementById('message');
        messageDiv.textContent=text;
        messageDiv.style.display='block';
        setTimeout(()=>{
            messageDiv.style.display='none';

        },3000);
    }

function changeQuantity(button, delta, price, productId, maxQuantity) {
    const quantitySpan = document.getElementById('quantity_span_' + productId);
    const formQuantityInput = document.getElementById('form_quantity_' + productId);
    const priceSpan = document.getElementById('price_' + productId);
    const totalPriceSpan = document.getElementById('totalPrice');
    const hiddenTotalInput = document.getElementById('hiddenTotalPrice');

    // Vérifier que les éléments DOM existent
    if (!quantitySpan || !formQuantityInput || !priceSpan || !totalPriceSpan || !hiddenTotalInput) {
        console.error('Un ou plusieurs éléments DOM sont introuvables pour productId:', productId);
        return;
    }

    let currentQuantity = parseInt(quantitySpan.textContent) || 0;
    let newQuantity = currentQuantity + delta;

    // Vérifications des limites
    if (newQuantity < 1) {
        alert("S'il vous plaît, commandez au moins un article !"); // Remplace showMessage par alert temporairement
        return;
    }
    if (newQuantity > maxQuantity) {
        alert("Malheureusement, c'est la quantité maximale disponible !");
        return;
    }

    // Mettre à jour la quantité si dans les limites
    if (newQuantity >= 1 && newQuantity <= maxQuantity) {
        quantitySpan.textContent = newQuantity;
        formQuantityInput.value = newQuantity;

        // Recalculer le prix du produit
        let newPrice = parseFloat(price) * newQuantity;
        priceSpan.textContent = newPrice.toFixed(2) + ' DA'; // Ajout de l'unité DA

        // Recalculer le total global (hypothèse : fonction personnalisée)
        updateTotalPrice(); // À définir si nécessaire
    }
}

// Fonction hypothétique pour recalculer le total (à adapter selon votre logique)
function updateTotalPrice() {
    let totalPrice = 0;
    document.querySelectorAll('[id^="price_"]').forEach(priceElement => {
        totalPrice += parseFloat(priceElement.textContent.replace(' DA', '')) || 0;
    });
    const totalPriceSpan = document.getElementById('totalPrice');
    const hiddenTotalInput = document.getElementById('hiddenTotalPrice');
    if (totalPriceSpan && hiddenTotalInput) {
        totalPriceSpan.textContent = totalPrice.toFixed(2) + ' DA';
        hiddenTotalInput.value = totalPrice.toFixed(2);
    }
}

function removeFromCart(key) {
    $.ajax({
        url: '../background/remove_from_cart.php',
        type: 'GET',
        data: { key: key },
        success: function(response) {
            console.log('AJAX success:', response); // ADD THIS
            if (response.status === 'success') {
                $('#product_' + key).remove();
                updateTotalPrice();
                checkCartEmpty();
            } else {
                alert("Failed to remove item from cart.");
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
}


function updateTotalPrice() {
    let totalPrice = 0;
    $('.product').each(function () {
        const productId = $(this).find('.price').attr('id').replace('price_', '');
        const price = parseFloat($('#price_' + productId).text());
        const quantity = parseInt($('#quantity_span_' + productId).text());
        totalPrice += price;
    });
    $('#totalPrice').text(totalPrice.toFixed(2));
    $('#hiddenTotalPrice').val(totalPrice.toFixed(2));
}

function checkCartEmpty() {
    if ($('.product').length === 0) {
        $('#cart-container').html('');
        $('h2').text('Your cart is empty');
        $('h3, #orderForm').remove();
    }
}
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
                <img src="images/téléchargement.png" alt="Matbakhii Logo">
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