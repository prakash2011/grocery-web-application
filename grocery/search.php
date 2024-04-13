
   <script>
    // Get the card container element
const cardContainer = document.getElementById('card-container');

// Add a class to the card container to display cards in a row
cardContainer.classList.add('row-display');
</script>
<style>
   .card-container {
    
    
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Distribute space between cards */
    gap: 20px; /* Adjust the space between cards */
}

.card {
    display: flex-box;
    margin-top:15px;
    width: calc(25% - 20px); /* 25% width for each card with gap in between */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    background-color:#c6ffc6;
}

.card:hover {
    transform: translateY(-5px);
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    color: #666;
}

.btn-primary {
    background-color: #1bff2e;
      border: none;
      color: #000000;
      border-radius: 10px;
      padding: 5px 10px;
}

.btn-primary:hover {
    background-color: green;
    border-color: white;
}
/* CSS to display cards in a row */
.row-display {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}



    </style>
 
<?php
 $servername="localhost";
 $username="root";
 $password="";
 $database="product";
 
 $conn=mysqli_connect($servername,$username,$password,$database);

if(isset($_POST['query']))
{
    
           $query = $_POST['query'];
           echo " your serch Result: " . $query . "<br>";
           $escaped_query = mysqli_real_escape_string($conn, $query);
    
           $sql = "SELECT * FROM `productlist` WHERE `productname` LIKE '%$query%'";
          $result = mysqli_query($conn, $sql);
          if($result !== false)
          { 
             if(mysqli_num_rows($result) > 0)
          
             while($row = mysqli_fetch_assoc($result))
             {
                $id=$row['productid'];
           $name=$row['productname'];
           $price=$row['price'];
           echo '
             <div class="card" style="width: 18rem;">
           <img src="https://source.unsplash.com/250x200/?'.$name.',grocery" class="card-img-top" alt="No photo added ">
           <div class="card-body">
             <h5 class="card-title">'.$name.'</h5>
             <p class="card-text">Price : '.$price.' Rs.</p>
             <a href="./shop.html" class="btn btn-primary">Add to cart</a>
           </div>
         </div>
         </div>
         ';
             
           
           }
                 
               }
    
            } 
         else 
        {
           echo "No matching product found.";
        }
 
   


?>
