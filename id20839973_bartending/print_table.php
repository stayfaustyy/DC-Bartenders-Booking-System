<?php
require('fpdf.php');

// Include your database connection and fetch the table data
require 'connection.php';

// Assuming you have a $conn variable for the database connection
$query = "SELECT COUNT(*) as total FROM tb_book";
$countResult = mysqli_query($conn, $query);
$countRow = mysqli_fetch_assoc($countResult);
$totalEntries = $countRow['total'];

$query = "SELECT eventreason, eventspacetype, eventaddress, eventdate, guestcount FROM tb_book";
$result = mysqli_query($conn, $query);

// Define the PDF class extending FPDF
class PDF extends FPDF {
  // Header method
  function Header() {
    // Set font and size for the header
    $this->SetFont('Arial', 'B', 12);
    // Title
    $this->Cell(0, 10, 'DC Bartenders Booking Report', 0, 1, 'C');
    // Line break
    $this->Ln(10);

    // Add your image/logo
    $this->Image('photos/Logo.png', 5, 1, 40); // Adjust the image path, position, and size as needed
  }

  // Footer method
  function Footer() {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Set font and size for the footer
    $this->SetFont('Arial', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }

  // Method to generate the table columns
  function CreateColumns($header) {
    // Set font and size for the table header
    $this->SetFont('Arial', 'B', 10);
    // Header
    foreach ($header as $col) {
      $this->Cell(40, 10, $col, 1);
    }
    $this->Ln();
  }

  // Method to generate the table rows
  function CreateRows($data) {
    // Set font and size for the table rows
    $this->SetFont('Arial', '', 10);
    // Data rows
    foreach ($data as $row) {
      foreach ($row as $column) {
        $this->Cell(40, 10, $column, 1);
      }
      $this->Ln();
    }
  }
}

// Create a new PDF instance
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Print the total count of entries/bookings
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Total Entries: ' . $totalEntries, 0, 1);
$pdf->Ln(10);

// Define the table header
$header = array('Event Reason', 'Event Space', 'Event Address', 'Event Date', 'Guest Count');

// Generate the table columns
$pdf->CreateColumns($header);

// Fetch the table data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Generate the table rows
$pdf->CreateRows($data);

// Output the PDF file
$pdf->Output();
?>
