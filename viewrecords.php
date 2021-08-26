<?php
  $title = "Attendees";
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  //Get all attendees
  $results = $crud->getAttendees();
?>

<table class="table">
  <tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Specialty</th>
    <th>Actions</th>
  </tr>
  <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
      <td> <?php echo $r['attendee_id']; ?> </td>
      <td> <?php echo $r['firstname']; ?> </td>
      <td> <?php echo $r['lastname']; ?> </td>
      <td> <?php echo $r['name']; ?> </td>
      <td>
        <a href="view.php?id=<?php echo $r['attendee_id']; ?>"><button class="btn btn-primary">View</button></a>
        <a href="edit.php?id=<?php echo $r['attendee_id']; ?>"><button class="btn btn-warning">Edit</button></a>
        <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id']; ?>"><button class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
  <?php }; ?>
</table>

<?php require_once 'includes/footer.php'; ?>