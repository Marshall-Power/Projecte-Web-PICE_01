<?php
  include 'connect.php';

  $client = $_POST["client"];
  $employee = $_POST["empleat"];
  
  $sql = "SELECT customers.ContactName, employees.FirstName, employees.LastName, orders.OrderDate, orders.ShipAddress, orders.ShipCity, orders.ShipCountry
          FROM orders
          LEFT JOIN customers
          ON orders.CustomerID = customers.CustomerID
          LEFT JOIN employees
          ON orders.EmployeeID = employees.EmployeeID
          WHERE customers.ContactName LIKE '%".$client."%'
          AND (employees.FirstName LIKE '%".$employee."%'
          OR employees.LastName LIKE '%".$employee."%')
          ";
  
  $dosql = $con->query($sql);
  while($result=$dosql->FETCH_ASSOC()){
    echo "<tr><td>".utf8_encode($result["ContactName"])."</td>
          <td>".$result["FirstName"]." ".$result["LastName"]."</td>
          <td>".$result["OrderDate"]."</td>
          <td>".utf8_encode($result["ShipAddress"])."</td>
          <td>".utf8_encode($result["ShipCity"])."</td>
          <td>".$result["ShipCountry"]."</td></tr>";
  }



  include 'close.php';
?>