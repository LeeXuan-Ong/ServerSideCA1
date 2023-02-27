
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>

        <?php
        foreach ($products as $product){
            echo "<tr>";
            echo "<th scope=\"row\">".$product["productID"]."</th>";
            echo "<td>".$product['productCode']."</td>";
            echo "<td>".$product['productName']."</td>";
            echo "<td>".$product['listPrice']."</td>";
            echo "</tr>";

        }?>

  </tbody>
</table>

</table>